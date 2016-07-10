<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UploadImagesToS3 extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $mls;

    protected $filename;

    protected $localDiskImage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mls, $filename, $localDiskImage)
    {
        $this->mls = $mls;

        $this->filename = $filename;

        $this->localDiskImage = $localDiskImage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $s3 = \Storage::disk('s3');

		$filePath = '/jacobsgroupvegas/properties/' . $this->mls . '/' . $this->filename;

		$s3->put($filePath, file_get_contents(public_path('images/uploads/properties/' . 'property-' . $this->mls . '-image-' . $this->filename)), 'public');

        dispatch(new KillImageFromDisk($this->localDiskImage));

		return $filePath;
    }
}
