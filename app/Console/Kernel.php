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
        $filePath = 'storage/app/scheduleResult.txt';

        if (env('APP_ENV') != 'local') {
            $schedule->command('rets:properties')
                ->hourly()
                ->sendOutputTo($filePath)
                ->emailOutputTo(env('SCHEDULE_OUTPUT_EMAIL'));
        }
    }
}
