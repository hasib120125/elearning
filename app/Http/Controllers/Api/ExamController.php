<?php

namespace App\Http\Controllers\Api;

class ExamController
{
    public function pendingAndCompleted()
    {
        $user = auth()->user();
        $pending = $user->exams()->whereIn('exam_user.status_id', [3, 4])->get();

        $completed = $user->exams()->where('exam_user.status_id', '=', 5)->orderBy('exam_user.completed_at', 'DESC')->get();

        return compact('pending', 'completed');
    }
}
