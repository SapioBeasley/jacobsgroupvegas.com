<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PullProperties extends Job implements ShouldQueue
{
  use InteractsWithQueue, SerializesModels;

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
		$days = 100;

		$time = date('H:i:s');
		$startDate = date('Y-m-d', strtotime('-40 days'));
		$date = date('Y-m-d', strtotime('-0days'));

		while ($startDate <= $date) {

      try {
        $results = \App\Libraries\RetsQuery::properties('Property', 'Listing', '(Area=101,102,103,201,202,203,204,301,302,303,401,402,403,404,405,501,502,503,504,505,601,602,603,604,605,606) AND (ListPrice=100000+) AND (PropertyType=RES) AND NOT (PropertySubType=CON) AND (Status=A) AND (OriginalEntryTimestamp=' . $startDate . 'T' . $time . '-' . date('Y-m-d', strtotime('-' . $days . 'days')) . ')');
      } catch (Exception $e) {
        Bugsnag::notifyException($e);
      } catch (PHRETS\Exceptions\CapabilityUnavailable $e) {
        Bugsnag::notifyException($e);
      }

			$days = $days - 20;

			$startDate = date('Y-m-d', strtotime("+20 days", strtotime($startDate)));

			$results = $this->appendDescription($results->toArray());

			foreach ($results as $property) {
        dispatch(new MakeProperty($property));
			}
		}
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
}
