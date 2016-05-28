<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Rets extends Command
{
	/**
	* The name and signature of the console command.
	*
	* @var string
	*/
	protected $signature = 'rets:properties {--function=}';

	/**
	* The console command description.
	*
	* @var string
	*/
	protected $description = 'Pull residential properties from rets and import into DB';

	/**
	* Create a new command instance.
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();

		$config = new \PHRETS\Configuration;

		$config->setLoginUrl(env('RETS_LOGIN_URL'))
			->setUsername(env('RETS_USERNAME'))
			->setPassword(env('RETS_PASSWORD'))
			->setRetsVersion(env('RETS_VERSION'));

		$this->rets = new \PHRETS\Session($config);

		$connect = $this->rets->Login();
	}

	/**
	* Execute the console command.
	*
	* @return mixed
	*/
	public function handle()
	{
		switch ($this->option('function')) {
			case 'pull':
				$properties = $this->pullProperties();
				break;

			case 'remove':
				$properties = $this->removeProperties();
				break;

			case 'clean':
				$clean = $this->removeUnrelatedImages();
				break;

			case 'elastic';
				$elsastic = $this->cleanElastic();
				break;

			default:
				$this->error('Your must specify either a pull, clean, or remove function');
				break;
		}

		$this->info('Disconnecting');
		$this->rets->Disconnect();
	}

	public function cleanElastic()
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$indexParams['index'] = 'properties';

		if ($client->indices()->exists($indexParams) != false) {
			$client->indices()->delete($indexParams);
			$this->info('Index reset');
		};

		return;
	}

	public function removeProperties()
	{
		$this->info('Removing old properties');

		$skip = 0;

		$bar = $this->output->createProgressBar(\App\Property::count());

		do {

			$properties = \App\Property::with('propertyImages')->take(20)->skip($skip)->get();

			foreach ($properties as $checkProperty) {

				$results = $this->retsQuery('Property', 'Listing', '(Matrix_Unique_ID = ' .  $checkProperty['Matrix_Unique_ID'] . ')');

				foreach ($results as $property) {

					switch (($property['Status']) === 'Active' || (($property['Status'] === 'Active-Exclusive Right') || ($property['Status'] === 'Exclusive Agency'))) {
						case false:

							if (! empty(($checkProperty->propertyImages->toArray()))) {
								$this->removeClosedImages($checkProperty->propertyImages);
							}

							$this->removeFromElasticSearch($property['MLSNumber']);

							$property = \App\Property::find($checkProperty['id']);
							$property->delete();
							break;

						default:
							# continue...
							break;
					}

					$bar->advance();
				}
			}

			$skip += 20;

		} while ($properties->isEmpty() == false);

		$this->info('Removed Unavailable Properties');

		$this->removeUnrelatedImages();
	}

	public function pullProperties()
	{
		$this->cleanElastic();

		$days = 280;

		$time = date('H:i:s');
		$startDate = date('Y-m-d', strtotime('-300 days'));
		$date = date('Y-m-d', strtotime('-0days'));

		while ($startDate <= $date) {

			$results = $this->retsQuery('Property', 'Listing', '(Area=101,102,103,201,202,203,204,301,302,303,401,402,403,404,405,501,502,503,504,505,601,602,603,604,605,606) AND (ListPrice=100000+) AND (PropertyType=RES) AND NOT (PropertySubType=CON) AND (Status=A,EA) AND (OriginalEntryTimestamp=' . $startDate . 'T' . $time . '-' . date('Y-m-d', strtotime('-' . $days . 'days')) . ')');

			$days = $days - 20;

			$startDate = date('Y-m-d', strtotime("+20 days", strtotime($startDate)));

			$this->info('Import began at ' . $time);
			$this->info('Properties to input: ' . count($results));
			$this->info('Date Range: ' . $startDate . ' to ' . date('Y-m-d', strtotime('-' . $days . 'days')));

			$results = $this->appendDescription($results->toArray());

			$bar = $this->output->createProgressBar(count($results));

			foreach ($results as $property) {

				$images = [];

				$createdProperty = \App\Property::where('MLSNumber', '=', $property['MLSNumber'])->with('propertyImages')->first();

				switch (true) {
					case ! is_null($createdProperty):
						$createProperty = $createdProperty->update($property);

						if ($property['PhotoCount'] > 0) {
							$propertyImages = $createdProperty['propertyImages']->toArray();

							foreach ($propertyImages as $image) {
								$images[] = $image['id'];
							}
						}

						$createdAt = $this->setCreatedAt($createdProperty->toArray());
					break;

					default:
						$createProperty = \App\Property::create($property);

						$listingAgent = $this->createListingAgent($createProperty, $property);

						$community = $this->createListingCommunity($createProperty, $property);

						if ($property['PhotoCount'] > 0) {

							$images = $this->getImages($createProperty, $property['Matrix_Unique_ID']);
						}

						$createdAt = $this->setCreatedAt($createProperty->toArray());
						break;
				}

				$client = \Elasticsearch\ClientBuilder::create()->build();

				$mainImage = $this->setMainImage($images);

				$params['index'] = 'properties';
				$params['type'] = 'property';
				$params['id'] = $property['MLSNumber'];
				$params['body'] = [
					'address' => $property['StreetNumber'] . ' ' . $property['StreetName'] . ' ' . $property['City'] . ' ' . $property['StateOrProvince'] . ' ' . $property['PostalCode'],
					'propertyType' => $property['Zoning'],
					'postalCode' => $property['PostalCode'],
					'streetName' => $property['StreetName'],
					'streetNumber' => $property['StreetNumber'],
					'city' => $property['City'],
					'state' => $property['StateOrProvince'],
					'CurrentPrice' => (integer) $property['CurrentPrice'],
					'Status' => $property['Status'],
					'MLSNumber' => $property['MLSNumber'],
					'BathsTotal' => $property['BathsTotal'],
					'LotSqft' => $property['LotSqft'],
					'BedsTotal' => $property['BedsTotal'],
					'CommunityName' => $property['CommunityName'],
					'description' => $property['customPropertyDescription'],
					'mainImage' => $mainImage,
					'entryDate' => $createdAt,
					'OriginalEntryTimestamp' => $property['OriginalEntryTimestamp']
				];

				$response = $client->index($params);

				$bar->advance();
			}

			$bar->finish();
		}
	}

	public function createListingCommunity($createProperty, $property)
	{
		$community = $property['CommunityName'];

		if ($community !== 'None') {
			$createdCommunity = \App\Community::where('community', '=', $community)->first();

			if (is_null($createdCommunity)) {
				$createProperty->community()->create([
					'community' => $community
				]);
			} else {
				$createProperty->community()->sync([$createdCommunity->id]);
			}
		}
	}

	public function createListingAgent($createProperty, $property)
	{
		$listingAgent = [
			'name' => $property['ListAgentFullName'],
			'phone' => $property['ListAgentDirectWorkPhone'],
			// 'email' => $property['email'],
		];

		if (! empty($listingAgent)) {
			$createdListingAgent = \App\ListingAgent::where('listAgentName', '=', $listingAgent['name'])->first();

			if (is_null($createdListingAgent)) {
				$createProperty->listingAgents()->create([
					'listAgentName' => $listingAgent['name'],
					'listAgentPhone' => $listingAgent['phone'],
					// 'email' => $listingAgent['email'],
				]);
			} else {
				$createProperty->listingAgents()->sync([$createdListingAgent->id]);
			}
		}

		return $listingAgent;
	}

	public function setCreatedAt($property)
	{
		$createdAt = $property['created_at'];

		return $createdAt;
	}

	public function getImages($property, $mlsNumber)
	{
		$images = $this->getPropertyImages($mlsNumber);

		$property->propertyImages()->sync($images);

		return $images;
	}

	public function retsQuery($object, $objectType, $query)
	{
		$results = $this->rets->Search($object, $objectType, $query, [
			'QueryType' => 'DMQL2',
			'Count' => 1, // count and records
			'Format' => 'COMPACT-DECODED',
			'StandardNames' => 0, // give system names
		]);

		return $results;
	}

	public function setMainImage($images)
	{
		if (! empty($images)) {
			$image = \App\Image::find(isset($images[0]) ? $images[0] : $images[1]);
		}

		$mainImage = isset($image) ? $image->dataUri : null;

		return $mainImage;
	}

	public function removeFromElasticSearch($mlsNumber)
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$params['index'] = 'properties';
		$params['type'] = 'property';
		$params['body']['query']['match']['MLSNumber'] = $mlsNumber;

		$response = $client->search($params);

		if (! empty($response['hits']['hits'])) {

			$paramsDelete['index'] = 'properties';
			$paramsDelete['type'] = 'property';
			$paramsDelete['id'] = $response['hits']['hits'][0]['_id'];

			$response = $client->delete($paramsDelete);

		} else {
			$this->info('Not found in Index');
		}

		return;
	}

	public function removeClosedImages($closedImages)
	{
		foreach ($closedImages as $image) {

			$propertyImage = \App\Image::find($image->id);

			$propertyImage->delete();

			$this->killImageFromDisk($image->dataUri);
		}

		return;
	}

	public function killImageFromDisk($image)
	{
		switch (true) {
			case file_exists(public_path($image)):
				unlink(public_path($image));
				break;

			case file_exists($image):
				unlink($image);
				break;

			default:
				# code...
				break;
		}

		return;
	}

	public function getPropertyImages($MLSNumber)
	{
		do {
			$photos = $this->rets->GetObject('Property', 'LargePhoto', $MLSNumber);

			if ($photos[0]->getContentId() == null) {
				$this->info('try again');
				sleep(5);
			}

		} while ($photos[0]->getContentId() == null);

		foreach ($photos as $photo) {

			$imageDiffer = str_random(40);

			$localDiskImage = public_path('images/uploads/properties/') . 'property-' . $MLSNumber . '-image-' . $imageDiffer . '.jpg';

			file_put_contents($localDiskImage, (string) $photo->getContent());

			$s3File = $this->uploadToS3($MLSNumber, $imageDiffer . '.jpg');

			$createImage = \App\Image::create([
				'dataUri' => 'https://s3.sapioweb.com' . $s3File
			]);

			$this->killImageFromDisk($localDiskImage);

			$images[] = $createImage->id;
		}

		return $images;
	}

	public function uploadToS3($mls, $filename)
	{
		$s3 = \Storage::disk('s3');
		$filePath = '/jacobsgroupvegas/properties/' . $mls . '/' . $filename;
		$s3->put($filePath, file_get_contents(public_path('images/uploads/properties/' . 'property-' . $mls . '-image-' . $filename)), 'public');

		return $filePath;
	}

	public function appendDescription($properties = [])
	{
		foreach ($properties as $propertyKey => $property) {
			$properties[$propertyKey]['customPropertyDescription'] = $this->buildPropertyDescription($properties[$propertyKey]);
		}

		return $properties;
	}

	public function buildPropertyDescription($propertyArray)
	{
		$properties = array_filter($propertyArray);
		$paragraphArray = $this->makeSentences($properties);

		return $paragraphArray;
	}

	public function makeSentences($property)
	{
		foreach ($property as $key => $propertyValue) {

			switch ($key) {
				case 'OriginalCurrentPrice':
					$propertyParagraph[] = 'Original list price of this home is ' . $propertyValue;
					break;

				case 'HighSchool':
					$propertyParagraph[] = 'Nearest high school in the area is ' . $propertyValue;
					break;

				case 'ElementarySchoolK2':
					$propertyParagraph[] = 'Nearest elementary school in the area is ' . $propertyValue;
					break;

				case 'JrHighSchool':
					$propertyParagraph[] = 'Nearest jr high school in the area is ' . $propertyValue;
					break;

				case 'CurrentPrice':
					$propertyParagraph[] = 'The list price for this property is ' . $propertyValue;
					break;

				case 'PropertySubType':

					$buildingDescription = isset($property['BuildingDescription']) ? ' ' . $property['BuildingDescription'] : ' ';

					$propertyParagraph[] = 'This' . $buildingDescription . ' property is a ' . $propertyValue . ' property';
					break;

				case 'Status':
					$propertyParagraph[] = 'Current listing Status is ' . $propertyValue;
					break;

				case 'MLSNumber':
					$propertyParagraph[] = 'The listing ID for this location is ' . $propertyValue;
					break;

				case 'YearBuilt':
					$propertyParagraph[] = 'Was built in ' . $propertyValue;
					break;

				case 'StreetNumber':
					$city = isset($property['City']) ? ' ' . $property['City'] . ' ' : ' ';

					$propertyParagraph[] = 'Located at ' . $property['StreetNumber'] . ' ' . $property['StreetName'] . $city . $property['StateOrProvince'] . ', ' . $property['PostalCode'];
					break;

				case 'BedsTotal':
					$propertyParagraph[] = 'This property has a total of ' . $propertyValue . ' beds';
					break;

				case 'BathsTotal':
					$propertyParagraph[] = 'This property has a total of ' . $propertyValue . ' baths';
					break;

				case 'CommunityName':
					if ($propertyValue == 'none') {
						contnue;
					}

					$propertyParagraph[] = 'Located in the community of ' . $propertyValue;
					break;

				case 'ApproxTotalLivArea':
					$propertyParagraph[] = 'The square footage of this property is ' . $propertyValue;
					break;

				case 'AssociationFeeYN':
					if ($propertyValue != '1') {
						contnue;
					}

					$rate = isset($property['AssociationFee1MQYN']) ? $property['AssociationFee1MQYN'] : 'undefined';

					$includes = isset($property['AssociationFeeIncludes']) ? 'which includes ' . $property['AssociationFeeIncludes'] : ' ';
					$fee = isset($property['AssociationFee1']) ?  $property['AssociationFee1'] . '/' . $rate :  'undefined';

					$name =  isset($property['AssociationName']) ? $property['AssociationName'] : 'association';

					$propertyParagraph[] = 'The association fee for this property is ' . $fee . ' ' . $includes . ' and paid to ' . $name . '.';
					break;

				case 'BathDownstairsDescription':
					$propertyParagraph[] = 'Also comes with a ' . $propertyValue;
					break;

				case 'Garage':

					$garageDescription = isset($property['GarageDescription']) ? ', that is ' . $property['GarageDescription'] : '. ';

					$propertyParagraph[] = 'Comes with a ' . $property['Garage'] . ' car garage' . $garageDescription;
					break;

				case 'CurrentPrice':
					$city = isset($property['City']) ? $property['City'] : 'home';

					$propertyParagraph[] = 'Current price of this ' . $city . ' property is ' . $property['CurrentPrice'] . '.';
					break;

				default:
					// $propertyParagraph = [];
					break;
			}
		}

		shuffle($propertyParagraph);

		$propertyParagraph = implode('. ', $propertyParagraph);

		return $propertyParagraph;
	}

	public function removeUnrelatedImages()
	{
		$skip = 0;

		$removeArray = [];

		$bar = $this->output->createProgressBar(\App\Image::whereDoesntHave('property')->count());

		do {

			$images = \App\Image::whereDoesntHave('property')->take(100)->skip($skip)->get();

			foreach ($images as $imageKey => $image) {

				\App\Image::find($image->id)->delete();

				$this->killImageFromDisk($image->dataUri);

				$removeArray[] = $image->dataUri;

				$bar->advance();
			};

			\Storage::delete($removeArray);

			$skip += 100;

		} while ($images->isEmpty() == false);

		$this->checkAgian();

		$bar->finish();

		$this->info('Unused images removed from DB');

		return;
	}

	public function checkAgian()
	{
		$images = \App\Image::whereDoesntHave('property')->get();

		if ($images->isEmpty() == false) {
			$this->removeUnrelatedImages();
		}

		return;
	}
}
