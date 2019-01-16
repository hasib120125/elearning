<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\CourseUser;
use App\Models\ExamUser;
use App\Mail\ExamAssigned;
use App\Mail\CourseComplete;
use Mail;

class CourseUserController
{
    public function index(Request $request)
    {
        $query = auth()->user()->courses()->with('topics.contents.file');

        return $query->get();
    }

    public function update(Request $request, $id)
    {
        $course_user = CourseUser::find($id);
        if (14 == $request->status_id) {
            $request->merge(['taken_at' => now()]);
        }
        if (15 == $request->status_id) {
            $request->merge(['completed_at' => now()]);
            $course_user->update($request->all());

            Mail::send(new CourseComplete($course_user->user, $course_user->course));
            $data = [
                'user' => $course_user->user,
                'course' => $course_user->course,
            ];
            if ($course_user->exam_user_id) {
                $exam_user = ExamUser::with('exam')->find($course_user->exam_user_id);
                if ($exam_user) {
                    $exam_user->started_at = now();
                    $exam_user->ended_at = $exam_user->exam->expired_at;
                    $exam_user->status_id = 3;
                    $exam_user->save();

                    Mail::send(new ExamAssigned($exam_user->user, $exam_user->exam, $exam_user->started_at, $exam_user->ended_at, $exam_user->email_body));

                    return $exam_user;
                }
            }
        }
        $course_user->update($request->all());
    }

    public function updateAPI(Request $request, $id)
    {
        $course_user = CourseUser::find($id);
      //  if (14 == $request->status_id) {
      //      $request->merge(['taken_at' => now()]);
      //  }
       // if (15 == $request->status_id) {
            $request->merge(['completed_at' => now()]);
          //  $request->merge(['status_id' => '15']);
            $course_user->update($request->all());

            Mail::send(new CourseComplete($course_user->user, $course_user->course));
            $data = [
                'user' => $course_user->user,
                'course' => $course_user->course,
            ];
            if ($course_user->exam_user_id) {
                $exam_user = ExamUser::with('exam')->find($course_user->exam_user_id);
                if ($exam_user) {
                    $exam_user->started_at = now();
                    $exam_user->ended_at = $exam_user->exam->expired_at;
                    $exam_user->status_id = 3;
                    $exam_user->save();

                    Mail::send(new ExamAssigned($exam_user->user, $exam_user->exam, $exam_user->started_at, $exam_user->ended_at, $exam_user->email_body));

                    return $exam_user;
                }
            }
      //  }
        $course_user->update($request->all());
    }

    public function updateByCourseId(Request $request, $course_id)
    {
        $course_user = CourseUser::where('course_id', $course_id)
            ->where('user_id', auth()->user()->id)->first();
        if (empty($course_user)) {
            $course_user = CourseUser::create([
                'course_id' => $course_id,
                'user_id' => auth()->user()->id,
                'status_id' => 20,
            ]);
        }
        $course_user->fill($request->all());
        $course_user->save();
    }
}
