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
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('users:lock')
            ->dailyAt('00:00');
        $schedule->command('exam:autoexpire')
            ->dailyAt('00:10');
        $schedule->command('question:autoexpire')
            ->dailyAt('00:10');
        $schedule->command('course:autoexpire')
            ->dailyAt('00:20');
        $schedule->command('queue:work --tries=3')
            ->everyFiveMinutes()
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
