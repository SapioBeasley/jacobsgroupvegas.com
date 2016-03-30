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
        $inspireFile = storage_path('app/inspire.txt');

        $schedule->command('inspire')
            ->twiceDaily(1, 13)
            ->sendOutputTo($inspireFile)
            ->emailOutputTo(env('SCHEDULE_OUTPUT_EMAIL'));

        $filePath = storage_path('app/scheduleResult.txt');

        if (env('APP_ENV') != 'local') {
            $schedule->command('rets:properties')
                ->twiceDaily(1, 13)
                ->sendOutputTo($filePath)
                ->emailOutputTo(env('SCHEDULE_OUTPUT_EMAIL'));
        }
    }
}
