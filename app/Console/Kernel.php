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

        // $schedule->command('inspire')
        //     ->everyMinute()
        //     ->sendOutputTo($filePath)
        //     ->emailOutputTo('andreas@sapioweb.com');

        $schedule->command('rets:properties')
            ->everyMinute()
            ->sendOutputTo($filePath)
            ->emailOutputTo(env('MAIL_USERNAME'));
    }
}
