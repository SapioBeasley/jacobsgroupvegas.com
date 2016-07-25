<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MakeProperty extends Job implements ShouldQueue
{
  use InteractsWithQueue, SerializesModels;

  protected $property;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($property)
  {
    $this->property = $property;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
    $images = [];

    try {
      $createdProperty = \App\Property::where('MLSNumber', '=', $this->property['MLSNumber'])->with('propertyImages')->first();
    } catch (Exception $e) {
      Bugsnag::notifyException($e);
    }

    switch (true) {
      case ! is_null($createdProperty):
        $createProperty = $createdProperty->update($this->property);
        break;

      default:
        $createProperty = \App\Property::create($this->property);

        $listingAgent = dispatch(new CreateListingAgent($createProperty, $this->property));

        $community = dispatch(new CreateListingCommunity($createProperty, $this->property));

        if ($this->property['PhotoCount'] > 0) {
          $images = dispatch(new GetPropertyImages($createProperty, $this->property['Matrix_Unique_ID']));
        }

        $createdAt = $this->setCreatedAt($createProperty->toArray());

        dispatch(new IndexProperty($this->property, $createdAt));
        break;
    }
  }

  public function setCreatedAt($property)
	{
		$createdAt = $property['created_at'];

		return $createdAt;
	}
}
