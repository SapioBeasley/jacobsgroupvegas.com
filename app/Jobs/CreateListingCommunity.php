<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateListingCommunity extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $property;

    protected $createProperty;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($createProperty, $property)
    {
        $this->property = $property;

        $this->createProperty = $createProperty;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		$community = $this->property['CommunityName'];

		if ($community !== 'None') {
			$createdCommunity = \App\Community::where('community', '=', $community)->first();

			if (is_null($createdCommunity)) {
				$this->createProperty->community()->create([
					'community' => $community
				]);
			} else {
				$this->createProperty->community()->sync([$createdCommunity->id]);
			}
		}
    }
}
