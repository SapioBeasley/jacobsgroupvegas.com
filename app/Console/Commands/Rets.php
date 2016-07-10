<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Rets extends Command
{
	use DispatchesJobs;

	/**
	* The name and signature of the console command.
	*
	* @var string
	*/
	protected $signature = 'rets:properties {--function=}';

	/**
	* The console command description.
	*
	* @var string
	*/
	protected $description = 'Pull residential properties from rets and import into DB';

	/**
	* Create a new command instance.
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
	}

	/**
	* Execute the console command.
	*
	* @return mixed
	*/
	public function handle()
	{
		switch ($this->option('function')) {
			case 'pull':
				$this->dispatch(new \App\Jobs\PullProperties());
				$this->info('Pulling new Properties');
				break;

			case 'remove':
				$this->dispatch(new \App\Jobs\RemoveProperties());
				$this->info('Removing Sold Properties');
				break;

			case 'clean':
				$this->dispatch(new \App\Jobs\RemoveUnrelatedImages());
				$this->info('Removing Unrelated Images');
				break;

			case 'elastic';
				$this->dispatch(new \App\Jobs\CleanElastic());
				$this->info('Elastic Search Cleaned');
				break;

			default:
				$this->error('Your must specify either a pull, clean, or remove function');
				break;
		}
	}
}
