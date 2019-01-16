<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class LogSuccessfulLogin
{
  /**
     * Handle the event.
     *
     * @param  LogEvent  $event
     * @return void
     */
    public function handle(Login $event)
    {
      activity('session')
            ->by($event->user)
            ->on($event->user)
            ->log('logged-in');
    }
}
