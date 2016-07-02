<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateListingAgent extends Job implements ShouldQueue
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
		$listingAgent = [
			'name' => $this->property['ListAgentFullName'],
			'phone' => $this->property['ListAgentDirectWorkPhone'],
			// 'email' => $property['email'],
		];

		if (! empty($listingAgent)) {
			$createdListingAgent = \App\ListingAgent::where('listAgentName', '=', $listingAgent['name'])->first();

			if (is_null($createdListingAgent)) {
				$this->createProperty->listingAgents()->create([
					'listAgentName' => $listingAgent['name'],
					'listAgentPhone' => $listingAgent['phone'],
					// 'email' => $listingAgent['email'],
				]);
			} else {
				$this->createProperty->listingAgents()->sync([$createdListingAgent->id]);
			}
		}

		return $listingAgent;
    }
}
