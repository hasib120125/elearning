<?php

namespace App\Http\Controllers\Api;

class SkillController
{
    public function index()
    {
        $skills = Skill::all();
        $skills = $skills->map(function ($skill) {
            $courses = $skill->courses;
            $skill->no_of_courses = $courses->count();
            $courses = auth()->user()->courses;
            $skill->completed_courses = $courses->filter(function ($course) {
                15 == $course->status_id;
            });
            $skill->incomplete_courses = $courses->whereNotIn('id', $skill->completed_courses->pluck('id'));
        });

        return $skills;
    }
}
