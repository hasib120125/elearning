<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Skill;
use App\Models\CourseUser;

class UserController
{
    public function self()
    {
        return auth()->user();
    }

    public function selfDetail()
    {
        $user = User::where('id', auth()->user()->id)->with('division')->with('department')->with('unit')->first();
        $user->no_of_courses_assigned = $user->courses()->count();
        $user->no_of_courses_attended = $user->courses()->where('course_user.status_id', '!=', 13)->count();
        $skills = Skill::with('courses')->get();
        $course_users = CourseUser::where('user_id', $user->id)
            ->get();
        $user->skills = $skills->map(function ($skill) use ($user, $course_users) {
            $courses = $skill->courses;
            $no_of_courses_done = 0;
            $completed_course_ids = $course_users->whereIn('course_id', $courses->pluck('id'))->where('status_id', 15)->pluck('course_id');
            $completed_courses = $courses->whereIn('id', $completed_course_ids);
            $incomplete_courses = $courses->whereNotIn('id', $completed_courses->pluck('id'));
            $no_of_courses_done = $completed_courses->count();
            $skill->user_percentage = 0;
            if ($count = $skill->courses->count()) {
                $skill->user_percentage = $no_of_courses_done / $count;
            }
            $skill->total_no_of_courses = $courses->count();
            $skill->no_of_completed_courses = $completed_courses->count();
            $skill->no_of_incomplete_courses = $incomplete_courses->count();

            $skill->completed_courses = $completed_courses->pluck('name');
            $skill->incomplete_courses = $incomplete_courses->pluck('name');
            unset($skill->courses);

            return $skill;
        });

        $courses_completed = $user->courses()->where('course_user.status_id', '=', 15)->get();
        $score = 0;
        foreach ($courses_completed as $course) {
            if (1 == $course->difficulty_id) {
                $score += 10;
            }
            if (2 == $course->difficulty_id) {
                $score += 20;
            }
            if (3 == $course->difficulty_id) {
                $score += 30;
            }
        }
        $user->score = $score;

        return $user;
    }
}
