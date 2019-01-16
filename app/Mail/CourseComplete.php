<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Setting;

class CourseComplete extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $course;
    protected $started_at;
    protected $ended_at;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_body = Setting::where('key', 'course_complete_email')->first();
        $body = $email_body ? $email_body->value : '';
        preg_match_all('/%([A-Za-z_]+)%/', $email_body, $slots);
        foreach ($slots[0] as $key => $slot) {
            if ($slots[1][$key] == 'username') {
                $body = str_replace($slot, $this->user->name, $body);
            } elseif ($slots[1][$key] == 'course_name') {
                $body = str_replace($slot, $this->course->name, $body);
            }
        }

        return $this->to($this->user->email)
            ->view('emails.exam-assigned', compact('body'));
    }
}
