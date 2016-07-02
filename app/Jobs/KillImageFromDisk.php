<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class KillImageFromDisk extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $image;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch (true) {
			case file_exists(public_path($this->image)):
				unlink(public_path($this->image));
				break;

			case file_exists($this->image):
				unlink($this->image);
				break;

			default:
				# code...
				break;
		}
    }
}
