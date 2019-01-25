<?php

namespace App\Http\Controllers;

use App\Models\ExamUser;
use App\Models\CourseUser;
use App\Models\CourseExtra;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;

class ExamUserController extends Controller
{
    public function show($id)
    {
        $exam_user = ExamUser::with('questions')->with('exam')->with('user')->find($id);

        return view('exam-user.show', compact('exam_user'));
    }
    
    public function certificate(Request $request, $id)
    {
        $course_user = CourseUser::where('exam_user_id', $id)->first();
        if(empty($course_user)){
            abort(404);
        }

        $course_extras = CourseExtra::where('exam_user_id', $id)->first();
        if(empty($course_extras)){                        
            abort(404);
        }

        $data = [
            'user' => $course_user->user->name,
            'course' => $course_extras->course->name,
            'signer_name1' => $course_extras->signer_name1,
            'signer_position1' => $course_extras->signer_position1,
            'signer_sign1' => $course_extras->signer_sign1,
            'signer_name2' => $course_extras->signer_name2,
            'signer_position2' => $course_extras->signer_position2,
            'signer_sign2' => $course_extras->signer_sign2,

        ];



        \PDF::loadView('course-user.certificate-pdf', $data, [], [
            'format' => 'Letter-L',
            ])->stream(\Storage::path('certificates/'.$course_user->id.'.pdf'));
    }
}
