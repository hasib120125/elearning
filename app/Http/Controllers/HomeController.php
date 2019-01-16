<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin|quiz-admin|admin')) {
            return view('dashboard');
        }
        if (1 != auth()->user()->source) {
            return redirect('quiz');
        }
        if (empty($quiz_description = Setting::where('key', 'quiz_description')->first())) {
            $quiz_description = '';
        } else {
            $quiz_description = $quiz_description->value;
        }

        if (empty($follow_description = Setting::where('key', 'follow_description')->first())) {
            $follow_description = '';
        } else {
            $follow_description = $follow_description->value;
        }

        return view('home', compact('quiz_description', 'follow_description'));
    }

    public function quiz()
    {
        if (auth()->user()->hasRole('follow-admin|quiz-admin|admin')) {
            return redirect()->route('home');
        }

        return view('exam');
    }
}
