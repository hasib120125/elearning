<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
  /**
     * Handle the event.
     *
     * @param  LogEvent  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        activity('session')
            ->by($event->user)
            ->on($event->user)
            ->log('logged-out');
    }
}
