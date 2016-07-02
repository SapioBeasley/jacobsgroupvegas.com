<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CleanElastic extends Job implements ShouldQueue
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
        $client = \Elasticsearch\ClientBuilder::create()->build();

		$indexParams['index'] = 'properties';

		if ($client->indices()->exists($indexParams) != false) {
			$client->indices()->delete($indexParams);
			$this->info('Index reset');
		};

		return;
    }
}
