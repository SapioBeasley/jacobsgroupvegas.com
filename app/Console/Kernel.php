<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	/**
	* The Artisan commands provided by your application.
	*
	* @var array
	*/
	protected $commands = [
		Commands\Inspire::class,
		Commands\Rets::class,
	];

	/**
	* Define the application's command schedule.
	*
	* @param  \Illuminate\Console\Scheduling\Schedule  $schedule
	* @return void
	*/
	protected function schedule(Schedule $schedule)
	{
		$pullFilePath = storage_path('app/pullResult.txt');
		$removeFilePath = storage_path('app/removeResult.txt');

		if (env('APP_ENV') != 'local') {
			$schedule->command('rets:properties --function=pull')
			->twiceDaily(1, 13)
			->withoutOverlapping()
			->sendOutputTo($pullFilePath)
			->emailOutputTo(env('SCHEDULE_OUTPUT_EMAIL'));

			$schedule->command('rets:properties --function=remove')
			->twiceDaily(3, 15)
			->sendOutputTo($removeFilePath)
			->emailOutputTo(env('SCHEDULE_OUTPUT_EMAIL'));
		}
	}
}
