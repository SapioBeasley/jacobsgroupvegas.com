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
		if (env('APP_ENV') != 'local') {
			$schedule->command('rets:properties --function=pull')
				->dailyAt('13:00')
				->withoutOverlapping();

			$schedule->command('rets:properties --function=remove')
				->dailyAt('14:00')
				->withoutOverlapping();
		}
	}
}
