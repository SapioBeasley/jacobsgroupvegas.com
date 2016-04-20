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

			default:
				$this->error('Your must specify either a pull or remove function');
				break;
		}
	}

	public function removeProperties()
	{
		$properties = \App\Property::with('propertyImages')->get();

		foreach ($properties as $checkProperty) {
			$results = $this->rets->Search('Property', '1', '(sysid = ' .  $checkProperty['sysId'] . ')', [
				'QueryType' => 'DMQL2',
				'Count' => 1, // count and records
				'Format' => 'COMPACT-DECODED',
				'StandardNames' => 0, // give system names
			]);

			$results = $this->fieldRename($results);

			foreach ($results as $property) {
				switch (($property['listingStatus'] === 'Active-Exclusive Right') || ($property['listingStatus'] === 'Exclusive Agency')) {
					case false:

						if (! empty(($checkProperty->propertyImages->toArray()))) {
							$closedImages = $checkProperty->propertyImages;

							$this->removeClosedImages($closedImages);
						}

						$client = \Elasticsearch\ClientBuilder::create()->build();

						// Find Document
						$params = [
							'index' => 'properties',
							'type' => 'property',
							'id' => $property['listingId']
						];

						$response = $client->delete($params);

						$property = \App\Property::find($checkProperty['id']);
						$this->info('unavailable property removed');
						$property->delete();
						break;

					default:
						# continue...
						break;
				}
			}
		}
	}

	public function pullProperties()
	{
		$days = 280;

		$time = date('H:i:s');
		$startDate = date('Y-m-d', strtotime('-300 days'));
		$date = date('Y-m-d', strtotime('-0days'));

		while ($startDate <= $date) {

			$results = $this->rets->Search('Property', '1', '(37=101,102,103,201,202,203,204,301,302,303,401,402,403,404,405,501,502,503,504,505,601,602,603,604,605,606) AND (242=EA, ER) AND (138=' . $startDate . 'T' . $time . '-' . date('Y-m-d', strtotime('-' . $days . 'days')) . ')', [
				'QueryType' => 'DMQL2',
				'Count' => 1, // count and records
				'Format' => 'COMPACT-DECODED',
				'StandardNames' => 0, // give system names
			]);

			// New Query
			// $results = $this->rets->Search('Property', 'listing', '*', [
			//     // 'Limit' => 1,
			// ]);

			$days = $days - 20;

			$startDate = date('Y-m-d', strtotime("+20 days", strtotime($startDate)));

			$this->info('Import began at ' . $time);
			$this->info('Properties to input: ' . count($results));
			$this->info('Date Range: ' . $startDate . ' to ' . date('Y-m-d', strtotime('-' . $days . 'days')));

			// dd($results);

			$results = $this->fieldRename($results);

			foreach ($results as $property) {

				$createdProperty = \App\Property::where('listingId', '=', $property['listingId'])->with('propertyImages')->first();

				// if (! is_null($createdProperty) && $createdProperty->listingId == '1549821') {
				// 	dd($createdProperty->toArray());
				// }

				switch (true) {
					case ! is_null($createdProperty):

						$this->info('Property Found Updating it');

						$createProperty = $createdProperty->update($property);

						$createdAt = $createdProperty->toArray();

						$createdAt = $createdAt['created_at'];

						// $images = $createdProperty->propertyImages->toArray();

						$this->info('Grabbing images');

						if ($createdProperty->listingStatus !== 'Closed') {
							$images = $this->getPropertyImages($property['sysId']);

							foreach ($images as $image) {
								$createdProperty->propertyImages()->create([
									'dataUri' => $image
								]);
							}
						}

						switch (true) {
							case ! isset($images[1]):
								$images[1] = isset($images[0]) ? $images[0] : [];
								break;

							default:
								// dd('contiue on');
								break;
						}

					break;

					default:
						$createProperty = \App\Property::create($property);

						$createdAt = $createProperty->toArray();

						$createdAt = $createdAt['created_at'];

						$community = $property['communityName'];

						$listingAgent = [
							'name' => $property['listAgentName'],
							'phone' => $property['listAgentPhone'],
							'email' => $property['email'],
						];

						if (! empty($listingAgent)) {
							$createdListingAgent = \App\ListingAgent::where('listAgentName', '=', $listingAgent['name'])->first();

							if (is_null($createdListingAgent)) {
								$createProperty->listingAgents()->create([
									'listAgentName' => $listingAgent['name'],
									'listAgentPhone' => $listingAgent['phone'],
									'email' => $listingAgent['email'],
								]);
							} else {
								$createProperty->listingAgents()->sync([$createdListingAgent->id]);
							}
						}

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

						if ($createProperty->listingStatus !== 'Closed') {
							$images = $this->getPropertyImages($property['sysId']);

							foreach ($images as $image) {
								$createProperty->propertyImages()->create([
									'dataUri' => $image
								]);
							}

							$propertyImages = \App\Property::where('listingId', '=', $property['listingId'])->with('propertyImages')->first()->toArray();
							$images = $propertyImages['property_images'];
						}
						break;
				}

				$client = \Elasticsearch\ClientBuilder::create()->build();

				$mainImage = null;

				$mainImage = $this->setMainImage($images);

				$this->info($mainImage);

				$params = [
					'index' => 'properties',
					'type' => 'property',
					'id' => $property['listingId'],
					'body' => [
						'address' => $property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state'] . ' ' . $property['postalCode'],
						'propertyType' => $property['propertyType'],
						'postalCode' => $property['postalCode'],
						'streetName' => $property['streetName'],
						'streetNumber' => $property['streetNumber'],
						'city' => $property['city'],
						'state' => $property['state'],
						'listPrice' => (integer) $property['listPrice'],
						'listingStatus' => $property['listingStatus'],
						'listingId' => $property['listingId'],
						'totalBaths' => $property['totalBaths'],
						'lotSqft' => $property['lotSqft'],
						'bedrooms' => $property['bedrooms'],
						'communityName' => $property['communityName'],
						'description' => $property['customPropertyDescription'],
						'mainImage' => $mainImage,
						'entryDate' => $createdAt,
						'listDate' => $property['listDate']
					]
				];

				$response = $client->index($params);
			}

			$this->info('Set Complete');
		}
	}

	public function setMainImage($images)
	{
		switch (true) {
			case isset($images[1]['dataUri']):
				$mainImage = $images[1]['dataUri'];
				break;

			case ! isset($images[1]):
				$mainImage = $images[0]['dataUri'];
				break;

			default:
				$mainImage = $images[1];
				break;
		}

		return $mainImage;
	}

	public function removeClosedImages($closedImages)
	{
		foreach ($closedImages as $image) {

			$propertyImage = \App\Image::find($image->id);

			$propertyImage->delete();

			if (file_exists(public_path($image->dataUri))) {
				unlink(public_path($image->dataUri));
			}
		}

		return;
	}

	public function getPropertyImages($listingId)
	{
		$photos = $this->rets->GetObject('Property', 'Photo', $listingId);

		foreach ($photos as $photo) {

			file_put_contents(public_path('images/uploads/properties/') . 'property-' . $listingId . '-image-' . $photo->getObjectId() . '.jpg', $photo->getContent());
			$images[] = 'images/uploads/properties/' . 'property-' . $listingId . '-image-' . $photo->getObjectId() . '.jpg';

		}

		return $images;
	}

	public function fieldRename($oldArray)
	{
		$newArray = [];

		foreach ($oldArray as $arrayData) {
			$newArray[] = [
				'sysId' => $arrayData['sysid'],
				'propertyType' => $arrayData['1'],
				'approximateAcreage' => $arrayData['2'],
				'postalCode' => $arrayData['10'],
				'streetName' => $arrayData['243'],
				'streetNumber' => $arrayData['244'],
				'yearBuilt' => $arrayData['264'],
				'city' => $arrayData['2909'],
				'state' => $arrayData['2963'],
				'listPrice' => (integer) $arrayData['144'],
				'listingStatus' => $arrayData['242'],
				'originalListPrice' => (integer) $arrayData['173'],
				'listingId' => $arrayData['163'],
				'propertyDescription' => $arrayData['268'],
				'totalBaths' => $arrayData['63'],
				'lotSqft' => $arrayData['2953'],
				'bedrooms' => $arrayData['68'],
				'waterHeaterDescription' => $arrayData['2932'],
				'garageDescription' => $arrayData['269'],
				'roofDescription' => $arrayData['270'],
				'lotDescription' => $arrayData['271'],
				'spaDescription' => $arrayData['272'],
				'poolDescription' => $arrayData['273'],
				'interiorDescription' => $arrayData['292'],
				'otherApplianceDescription' => $arrayData['290'],
				'constructionDescription' => $arrayData['291'],
				'flooringDescription' => $arrayData['293'],
				'fireplaceDescription' => $arrayData['294'],
				'builtDescription' => $arrayData['72'],
				'carportDescription' => $arrayData['73'],
				'parkingDescription' => $arrayData['2438'],
				'5thBedroomDescription' => $arrayData['97'],
				'heatingDescription' => $arrayData['301'],
				'greatRoomDescription' => $arrayData['2432'],
				'bathDownstairsDescription' => $arrayData['64'],
				'coolingFuelDescription' => $arrayData['86'],
				'diningRoomDescription' => $arrayData['276'],
				'familyRoomDescription' => $arrayData['277'],
				'kitchenDescription' => $arrayData['278'],
				'livingRoomDescription' => $arrayData['279'],
				'masterBedroomDescription' => $arrayData['281'],
				'2ndBedroomDescription' => $arrayData['282'],
				'3rdBedroomDescription' => $arrayData['283'],
				'4thBedroomDescription' => $arrayData['284'],
				'possessionDescription' => $arrayData['285'],
				'ovenDescription' => $arrayData['289'],
				'equestrianDescription' => $arrayData['296'],
				'miscellaneousDescription' => $arrayData['298'],
				'exteriorDescription' => $arrayData['299'],
				'landscapeDescription' => $arrayData['300'],
				'heatingFuelDescription' => $arrayData['302'],
				'energyDescription' => $arrayData['305'],
				'furnishingsDescription' => $arrayData['2426'],
				'loftDescription' => $arrayData['2539'],
				'unitDescription' => $arrayData['2543'],
				'saleType' => $arrayData['2941'],
				'idx' => $arrayData['1809'],
				'images' => $arrayData['129'],
				'photoExcluded' => $arrayData['2883'],
				'communityName' => $arrayData['155'],
				'entryDate' => $arrayData['104'],
				'daysOnMarket' => $arrayData['2940'],
				'virtualTourLink' => $arrayData['2139'],
				'solarElectric' => $arrayData['2978'],
				'ageRestricted' => $arrayData['2983'],
				'associationFee1' => $arrayData['39'],
				'garage' => $arrayData['122'],
				'internet' => $arrayData['130'],
				'2ndBedroomDimensions' => $arrayData['89'],
				'3rdBedroomDimensions' => $arrayData['90'],
				'4thBedroomDimensions' => $arrayData['91'],
				'diningRoomDimensions' => $arrayData['92'],
				'familyRoomDimensions' => $arrayData['93'],
				'5thBedroomDimensions' => $arrayData['94'],
				'livingRoomDimensions' => $arrayData['95'],
				'masterBedroomDimensions' => $arrayData['96'],
				'model' => $arrayData['164'],
				'pvPool' => $arrayData['203'],
				'sewer' => $arrayData['219'],
				'closePriceSale Price' => (integer) $arrayData['210'],
				'closeDate' => $arrayData['25'],
				'listAgentName' => $arrayData['26'],
				'listAgentPhone' => $arrayData['27'],
				'email' => $arrayData['2385'],
				'listDate' => $arrayData['138'],
				//
				// TODO: Unset until column is in db
				//  'legalLctnTownship' => $arrayData['3'],
				//  'leaseEnd' => $arrayData['2977'],
				// 'greenCertificationRating' => $arrayData['2931'],
				// 'gated' => $arrayData['2946'],
				// 'subdivisionName' => $arrayData['247'],
				// 'masterPlanFeeAmount' => $arrayData['249'],
				// 'unitNumber' => $arrayData['2386'],
				// 'width' => $arrayData['2448'],
				// 'litigation' => $arrayData['2454'],
				// 'ownership' => $arrayData['2505'],
				// 'type' => $arrayData['2507'],
				// 'assessmentYN' => $arrayData['109'],
				// 'fence' => $arrayData['112'],
				// 'fireplaces' => $arrayData['113'],
				// 'convertedGarage' => $arrayData['120'],
				// 'manufactured' => $arrayData['2630'],
				// 'contractDateAcceptance' => $arrayData['85'],
				// 'legalLctnRange' => $arrayData['4'],
				// 'legalLctnSection' => $arrayData['5'],
				// 'additionalAUSoldTerms' => $arrayData['2890'],
				// 'saleOfficeBonus' => $arrayData['70'],
				// 'builder' => $arrayData['71'],
				// 'carport' => $arrayData['74'],
				// 'contingencyDesc' => $arrayData['84'],
				// 'washerIncluded' => $arrayData['2440'],
				// 'publicAddressYN' => $arrayData['2858'],
				// 'commentaryYN' => $arrayData['2859'],
				// 'publicAddress' => $arrayData['2861'],
				// 'priceChgDate' => $arrayData['2908'],
				// 'countyName' => $arrayData['87'],
				// 'compassPoint' => $arrayData['100'],
				// 'earnestDeposit' => $arrayData['103'],
				// 'auctionType' => $arrayData['2879'],
				// 'documentFolderID' => $arrayData['2903'],
				// 'documentFolderCount' => $arrayData['2904'],
				// 'accessibilityFeatures' => $arrayData['2925'],
				// 'greenFeatures' => $arrayData['2927'],
				// 'pvSpa' => $arrayData['236'],
				// 'water' => $arrayData['261'],
				// 'tempOffMrktStatusDesc' => $arrayData['2892'],
				// 'tStatusDate' => $arrayData['2893'],
				// 'landUse' => $arrayData['132'],
				// 'area' => $arrayData['37'],
				// 'assessmentAmount' => $arrayData['38'],
				// 'associationFee' => $arrayData['58'],
				// 'threeQuarterBaths' => $arrayData['60'],
				// 'fullBaths' => $arrayData['61'],
				// 'halfBaths' => $arrayData['62'],
				// 'modificationTimestamp' => $arrayData['135'],
				// 'metroMapMapCoor' => $arrayData['158'],
				// 'LPSqFt' => $arrayData['2341'],
				// 'associationFee2' => $arrayData['32'],
				// 'refrigeratorIncluded' => $arrayData['33'],
				// 'dryerUtilities' => $arrayData['34'],
				// 'associationName' => $arrayData['35'],
				// 'associationPhone' => $arrayData['36'],
				// 'metroMapMapPage' => $arrayData['159'],
				// 'LOName' => $arrayData['171'],
				// 'listAgentAgentID' => $arrayData['143'],
				// 'SIDLIDAnnualAmount' => $arrayData['54'],
				// 'associationFee2' => $arrayData['56'],
				// 'greenBuildingCertification' => $arrayData['2928'],
				// 'greenYearCertified' => $arrayData['2929'],
				// 'zoning' => $arrayData['266'],
				// 'bedroomsTotalPossible' => $arrayData['2379'],
				// 'greatRoomDimensions' => $arrayData['2430'],
				// 'length' => $arrayData['2434'],
				// 'greenCertifyingBody' => $arrayData['2930'],
				// 'groundMountedYN' => $arrayData['125'],
				// 'associationFee1' => $arrayData['127'],
				// 'zUnused' => $arrayData['2852'],
				// 'AVMYN' => $arrayData['2860'],
				// 'SPLP' => $arrayData['2864'],
				// 'auctionDate' => $arrayData['2878'],
				// 'lastTransactionCode' => $arrayData['134'],
				// 'listOfficeOfficeID' => $arrayData['137'],
				// 'statusChangeDate' => $arrayData['18'],
				// 'annualPropertyTaxes' => $arrayData['28'],
				// 'dishwasherInc' => $arrayData['30'],
				// 'disposalIncluded' => $arrayData['31'],
				// 'coolingSystem' => $arrayData['303'],
				// 'utilityInformation' => $arrayData['304'],
				// 'subdivisionNumber' => $arrayData['1734'],
				// 'LPSqFtWithCents' => $arrayData['1738'],
				// 'LOPhone' => $arrayData['172'],
				// 'ownerLicensee' => $arrayData['175'],
				//
				// TODO: Properly Name
				// 'TaxID  Parcel #' => $arrayData['176'],
				// 'Tax District' => $arrayData['177'],
				// 'Den/Other' => $arrayData['184'],
				// 'Pool Length' => $arrayData['186'],
				// 'Pool Width' => $arrayData['187'],
				// 'Power On or Off' => $arrayData['188'],
				// 'Previous Price' => $arrayData['199'],
				// 'Property Condition' => $arrayData['202'],
				// 'Legal Location Range' => $arrayData['204'],
				// 'Record Delete Date DateTime    10' => $arrayData['205'],
				// 'Realtor? Y/N' => $arrayData['206'],
				// 'Record Delete Flag' => $arrayData['207'],
				// 'Existing Rent' => $arrayData['208'],
				// 'SaleOfficeOfficeID Buyer Broker' => $arrayData['211'],
				// 'Elementary School 3-5' => $arrayData['213'],
				// 'High School' => $arrayData['214'],
				// 'Jr High School' => $arrayData['215'],
				// 'Year Round School' => $arrayData['216'],
				// 'Legal Location Section' => $arrayData['217'],
				// 'SaleAgentAgentID   Buyer Agent Public ID' => $arrayData['218'],
				// 'SID/LID Balance' => $arrayData['221'],
				// 'Amt Owner Will Carry' => $arrayData['228'],
				// 'Loft' => $arrayData['231'],
				// 'Sellers Contribution $' => $arrayData['232'],
				// 'soldTerm' => $arrayData['233'],
				// 'Sort Price' => $arrayData['235'],
				// 'Master Plan Fee - M,Q,Y,N' => $arrayData['250'],
				// 'Legal Location Township' => $arrayData['253'],
				// 'Washer Dryer Location' => $arrayData['260'],
				// Directions  Directions'' => $arrayData['274'],
				// 'Master Bath Desc' => $arrayData['280'],
				// 'Financing Considered' => $arrayData['287'],
				// 'Show (Additional)' => $arrayData['288'],
				// 'Fence Type' => $arrayData['295'],
				// 'House Faces' => $arrayData['297'],
				// 'Est Clo/Lse dt DateTime    10' => $arrayData['1736'],
				// 'Open House Flag' => $arrayData['2237'],
				// 'Last Image Trans Date  DateTime    10' => $arrayData['2238'],
				// 'Metro Map Coor XP' => $arrayData['2343'],
				// 'Metro Map Page XP' => $arrayData['2345'],
				// 'Subdivision Name XP' => $arrayData['2353'],
				// 'SP/SqFt [w/cents]' => $arrayData['2359'],
				// 'Subdivision #' => $arrayData['2367'],
				// 'Short Sale' => $arrayData['2369'],
				// 'Elementary School K-2' => $arrayData['2377'],
				// 'Days from Listing to Close' => $arrayData['2381'],
				// 'Fax #' => $arrayData['2383'],
				// 'Assoc/Comm Features Desc' => $arrayData['2388'],
				// 'Association Fee Includes' => $arrayData['2390'],
				// 'Bath Downstairs? Y/N' => $arrayData['2392'],
				// 'Bedroom Downstairs? Y/N' => $arrayData['2394'],
				// 'Bldg Desc' => $arrayData['2414'],
				// 'Building Number' => $arrayData['2416'],
				// 'convertedto Real Property' => $arrayData['2418'],
				// 'courtApproval' => $arrayData['2420'],
				// 'Fireplace Location' => $arrayData['2422'],
				// 'Foreclosure Commenced Y/N' => $arrayData['2424'],
				// 'Great Room Y/N' => $arrayData['2428'],
				// 'Dryer Included?' => $arrayData['2442'],
				// 'House Views' => $arrayData['2450'],
				// 'Property Subtype' => $arrayData['2452'],
				// 'SID/LID Y/N' => $arrayData['2463'],
				// 'Assessment Amount Type' => $arrayData['2465'],
				// 'Litigation Type' => $arrayData['2467'],
				// 'MHYrBlt' => $arrayData['2509'],
				// 'DEN Dim' => $arrayData['2511'],
				// 'LOFT Dim' => $arrayData['2513'],
				// 'Loft Dimensions 1stFloor' => $arrayData['2535'],
				// 'Loft Dimensions 2ndFloor' => $arrayData['2537'],
				// 'Studio Y/N' => $arrayData['2547'],
				// 'Condo Conversion Y/N' => $arrayData['2549'],
				// 'Repo/Reo Y/N' => $arrayData['2660'],
				// 'NOD Date   DateTime    10' => $arrayData['2661'],
			];
		}

		foreach ($newArray as $propertyArrayKey => $property) {
			foreach ($property as $propertyKey => $propertyValue) {
				switch (true) {
					case $propertyValue == 'Single Family Res':
						$property[$propertyKey] = 'single family';
						break;

					default:
						# code...
						break;
				}
			}

			$newArray[$propertyArrayKey]['customPropertyDescription'] = $this->buildPropertyDescription($newArray[$propertyArrayKey]);
		}


		return $newArray;
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
				case 'originalListPrice':
					$propertyParagraph[] = 'Original list price of this home is ' . $propertyValue;
					break;

				case 'listingStatus':
					$propertyParagraph[] = 'Current listing status is ' . $propertyValue;
					break;

				case 'propertyType':
					$propertyParagraph[] = 'Property is a ' . $propertyValue . ' property';
					break;

				case 'listPrice':
					$propertyParagraph[] = 'The list price for this property is ' . $propertyValue;
					break;

				case 'approximateAcreage':
					$propertyParagraph[] = 'The approximate acreage of this property is ' . $propertyValue;
					break;

				case 'streetNumber':
					$propertyParagraph[] = 'Located at ' . $property['streetNumber'] . ' ' . $property['streetName'] . ' ' . $property['city'] . ' ' . $property['state'] . ', ' . $property['postalCode'];
					break;

				case 'yearBuilt':
					$propertyParagraph[] = 'Was built in ' . $propertyValue;
					break;

				case 'listingId':
					$propertyParagraph[] = 'The listing ID for this location is '. $propertyValue;
					break;

				// case 'propertyDescription':
				//     $propertyParagraph[] = 'Property has ' . $propertyValue . ' ;
				//     break;

				case 'totalBaths':
					$propertyParagraph[] = 'This property has a total of ' . $propertyValue . ' baths';
					break;

				// case 'lotSqft':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				case 'bedrooms':
					$propertyParagraph[] = 'This property has a total of ' . $propertyValue . ' bedrooms';
					break;

				// case 'roofDescription':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'lotDescription':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'interiorDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'otherApplianceDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'constructionDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'flooringDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'fireplaceDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'builtDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'heatingDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'bathDownstairsDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'coolingFuelDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'diningRoomDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'familyRoomDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'kitchenDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'livingRoomDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'masterBedroomDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'possessionDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'ovenDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'equestrianDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'miscellaneousDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'exteriorDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'landscapeDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'heatingFuelDescription'
				//     $propertyParagraph[] = . $property;
				//     break;

				// case 'energyDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'furnishingsDescription'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'saleType'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				case 'communityName':
					if ($propertyValue == 'none') {
						contnue;
					}

					$propertyParagraph[] = 'Located in the community of ' . $propertyValue;
					break;

				// case 'entryDate'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'associationFee1':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'internet':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case '2ndBedroomDimensions':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case '3rdBedroomDimensions':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'diningRoomDimensions':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'familyRoomDimensions':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'livingRoomDimensions':
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				case 'masterBedroomDimensions':
					$propertyParagraph[] = 'Dimensions of the master bedroom are ' . $propertyValue;
					break;

				// case 'pvPool'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'sewer'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;

				// case 'closePriceSale'
				//     $propertyParagraph[] = . $propertyValue;
				//     break;


				default:
					# contnue...
					break;
			}
		}

		shuffle($propertyParagraph);

		$propertyParagraph = implode('. ', $propertyParagraph);

		return $propertyParagraph;
	}
}
