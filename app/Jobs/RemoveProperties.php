<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveProperties extends Job implements ShouldQueue
{
  use InteractsWithQueue, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct()
  {
      //
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
		$properties = \App\Property::with('propertyImages')->get();

		foreach ($properties as $checkProperty) {

      try {
		    $results = \App\Libraries\RetsQuery::properties('Property', 'Listing', '(Matrix_Unique_ID = ' .  $checkProperty['Matrix_Unique_ID'] . ')');
          } catch (Exception $e) {
            Bugsnag::notifyException($e);
          } catch (PHRETS\Exceptions\CapabilityUnavailable $e) {
            Bugsnag::notifyException($e);
          }

			foreach ($results as $property) {

				if ($property['Status'] !== 'Active') {

					if (! empty(($checkProperty->propertyImages->toArray()))) {
						$this->removeClosedImages($checkProperty->propertyImages);
					}

					$this->removeFromElasticSearch($property['MLSNumber']);

					$property = \App\Property::find($checkProperty['id']);

          if ($property) {
            $property->delete();
          }
				}
			}
		}

    dispatch((new \App\Jobs\RemoveUnrelatedImages())->onQueue('images'));
  }

  public function removeFromElasticSearch($mlsNumber)
	{
		$client = \Elasticsearch\ClientBuilder::create()->build();

		$params['index'] = 'properties';
		$params['type'] = 'property';
		$params['body']['query']['match']['MLSNumber'] = $mlsNumber;

    try {
      $response = $client->search($params);
    } catch (Elasticsearch\Common\Exceptions\Missing404Exception $e) {
      Bugsnag::notifyException($e);
    }

		if (! empty($response['hits']['hits'])) {
			$paramsDelete['index'] = 'properties';
			$paramsDelete['type'] = 'property';
			$paramsDelete['id'] = $response['hits']['hits'][0]['_id'];

			$response = $client->delete($paramsDelete);
		}
	}

  public function removeClosedImages($closedImages)
	{
		foreach ($closedImages as $image) {

			$propertyImage = \App\Image::find($image->id);

      if ($propertyImage) {
			  $propertyImage->delete();
      }

      dispatch((new KillImageFromDisk($image->dataUri))->onQueue('killImage'));
		}
	}
}
