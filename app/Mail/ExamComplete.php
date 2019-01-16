<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\CourseUser;
use App\Models\Setting;
use PDF;

class ExamComplete extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $exam;
    protected $exam_user;

    /**
     * Create a new message instance.
     */
    public function __construct($exam_user)
    {
        $this->user = $exam_user->user;
        $this->exam = $exam_user->exam;
        $this->exam_user = $exam_user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_body = Setting::where('key', 'exam_complete_email')->first();
        $body = $email_body ? $email_body->value : '';
        preg_match_all('/%([A-Za-z_]+)%/', $body, $slots);
        foreach ($slots[0] as $key => $slot) {
            if ($slots[1][$key] == 'username') {
                $body = str_replace($slot, $this->user->name, $body);
            } elseif ($slots[1][$key] == 'exam_title') {
                $body = str_replace($slot, $this->exam->title, $body);
            }
        }

        $email = $this->to($this->user->email)
            ->view('emails.exam-assigned', compact('body'));
        if ($this->exam_user->state['scorePercent'] >= 80 || true) {
            $course_user = CourseUser::where('exam_user_id', $this->exam_user->id)->first();
            if (!empty($course_user)) {
                $data = [
                    'user' => $course_user->user,
                    'course' => $course_user->course,
                ];
                PDF::loadView('course-user.certificate-pdf', $data, [], [
                    'format' => 'Letter-L',
                    ])->save('/nfs_share/certificates/'.$course_user->id.'.pdf');
                $email = $email->attach('/nfs_share/certificates/'.$course_user->id.'.pdf', [
                        'as' => 'Certificate.pdf',
                    ]);
            }
        }

        return $email;
    }
}
