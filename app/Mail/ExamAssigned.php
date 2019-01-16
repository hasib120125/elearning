<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExamAssigned extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $user;
    protected $exam;
    protected $started_at;
    protected $ended_at;
    protected $email_body;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $exam, $started_at, $ended_at, $email_body)
    {
        $this->user = $user;
        $this->exam = $exam;
        $this->started_at = $started_at;
        $this->ended_at = $ended_at;
        $this->email_body = $email_body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $body = $this->email_body;
        preg_match_all('/%([A-Za-z_]+)%/', $this->email_body, $slots);
        foreach ($slots[0] as $key => $slot) {
            if ($slots[1][$key] == 'username') {
                $body = str_replace($slot, $this->user->name, $body);
            } elseif ($slots[1][$key] == 'start_date') {
                $body = str_replace($slot, $this->started_at, $body);
            } elseif ($slots[1][$key] == 'end_date') {
                $body = str_replace($slot, $this->ended_at, $body);
            } elseif ($slots[1][$key] == 'exam_title') {
                $body = str_replace($slot, $this->exam->title, $body);
            }
        }

        return $this->to($this->user->email)
            ->view('emails.exam-assigned', compact('body'));
    }
}
