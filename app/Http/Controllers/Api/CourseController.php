<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\ExamUser;
use App\Models\Setting;
use App\Models\LiveclassUser;
use Illuminate\Http\Request;

class CourseController
{
    public function index(Request $request)
    {
        $query = Course::with([
            'course_users' => function ($query) {
                $query->where('user_id', auth()->user()->id);
            }, ])
            ->with('difficulty')
            ->with('topics.contents.file')
            ->where('status_id', 11)
            ->orderBy('started_at');
        if ('new' == $request->order) {
            $query = $query->orderBy('created_at');
        }
        if ('pop' == $request->order) {
            $query = $query->orderBy('created_at');
        }
        if ('top' == $request->order) {
            $query = $query->orderBy('created_at');
        }
        $courses = $query->get();
        $courses = $courses->map(function ($course) {
            $course_user = CourseUser::where('course_id', $course->id)
                ->where('user_id', auth()->user()->id)
                ->select('is_favorite')
                ->first();
            $course->user_is_favorite = $course_user ? $course_user->is_favorite : false;
            $course->no_of_users = CourseUser::where('course_id', $course->id)->count();

            return $course;
        });

        return $courses;
    }

    public function indexForHome(Request $request)
    {
    }

    public function show($id)
    {
        return Course::with([
            'course_users' => function ($query) {
                $query->where('user_id', auth()->user()->id);
            }, ])->with('topics.contents.file')->find($id);
    }

    public function selfAssign($course_id)
    {
        $course_user = CourseUser::where('course_id', $course_id)
            ->where('user_id', auth()->user()->id)->first();
        if (empty($course_user)) {
            $course_user = new CourseUser();
        }
        if (empty($course_user->status_id) || 20 == $course_user->status_id) {
            $course_user->course_id = $course_id;
            $course_user->user_id = auth()->user()->id;
            $course_user->is_self_assigned = true;
            $course_user->taken_at = now();
            $course_user->status_id = 14;
            $course_user->save();
        }
        $course = $course_user->course;
        if (!empty($course) && $course->exam_id) {
            $exam_email_body = Setting::where('key', 'exam_assign_email')->first();
            $exam_email_body = $exam_email_body ? $exam_email_body->value : '';
            $exam_user = ExamUser::create([
                'exam_id' => $course->exam_id,
                'user_id' => auth()->user()->id,
                'status_id' => 7,
                'email_body' => $exam_email_body,
            ]);
        }

        return $course_user;
    }

    public function lives(){
        return LiveclassUser::all();
    }
}
