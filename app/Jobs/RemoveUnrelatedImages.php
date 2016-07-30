<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveUnrelatedImages extends Job implements ShouldQueue
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
    $this->removeUnrelatedImages();

		$this->checkAgian();

		return;
  }

  public function removeUnrelatedImages()
  {
    $skip = 0;

		$removeArray = [];

		do {

			$images = \App\Image::whereDoesntHave('property')->take(100)->skip($skip)->get();

			foreach ($images as $imageKey => $image) {

				\App\Image::find($image->id)->delete();

				dispatch(new KillImageFromDisk($image->dataUri));

				$removeArray[] = $image->dataUri;
			};

			\Storage::delete($removeArray);

			$skip += 100;

		} while ($images->isEmpty() == false);
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
