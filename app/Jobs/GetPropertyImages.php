<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetPropertyImages extends Job implements ShouldQueue
{
  use InteractsWithQueue, SerializesModels;

  protected $property;

  protected $mlsNumber;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct($property, $mlsNumber)
  {
    $this->property = $property;

    $this->mlsNumber = $mlsNumber;
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle()
  {
		$images = $this->getPropertyImages($this->mlsNumber);

		$this->property->propertyImages()->sync($images);

		return $images;
  }

  public function getPropertyImages($MLSNumber)
	{
		do {
      // TODO: this may be where the timeout is occuring
      $photos = \App\Libraries\RetsQuery::photos('Property', 'LargePhoto', $MLSNumber);

		} while ($photos[0]->getContentId() == null);

		foreach (array_slice($photos->toArray(), 0, 10) as $photo) {

			$imageDiffer = str_random(40);

      $localDiskImage = '/tmp' . '/property-' . $MLSNumber . '-image-' . $imageDiffer . '.jpg';

			file_put_contents($localDiskImage, (string) $photo->getContent());

			$s3File = dispatch(new UploadImagesToS3($MLSNumber, $imageDiffer . '.jpg', $localDiskImage));

			$createImage = \App\Image::create([
				'dataUri' => 'https://s3.sapioweb.com/jacobsgroupvegas/properties/'  . env('APP_ENV') . '/' . $MLSNumber . '/' . $imageDiffer . '.jpg'
			]);

			$images[] = $createImage->id;
		}

    return $images;
	}
}
