<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $competency = Setting::where('key', 'competency')->first();
        $competencies = [];
        if ($competency) {
            $competencies = json_decode($competency->value);
        }
        $exam_assign_email = Setting::where('key', 'exam_assign_email')->first();
        if ($exam_assign_email) {
            $exam_assign_email = $exam_assign_email->value;
        }
        $exam_complete_email = Setting::where('key', 'exam_complete_email')->first();
        if ($exam_complete_email) {
            $exam_complete_email = $exam_complete_email->value;
        }
        $course_assign_email = Setting::where('key', 'course_assign_email')->first();
        if ($course_assign_email) {
            $course_assign_email = $course_assign_email->value;
        }
        $course_complete_email = Setting::where('key', 'course_complete_email')->first();
        if ($course_complete_email) {
            $course_complete_email = $course_complete_email->value;
        }
        $quiz_description = Setting::where('key', 'quiz_description')->first();
        if ($quiz_description) {
            $quiz_description = $quiz_description->value;
        }
        $follow_description = Setting::where('key', 'follow_description')->first();
        if ($follow_description) {
            $follow_description = $follow_description->value;
        }

        return view('settings.index', compact('competencies', 'exam_assign_email', 'exam_complete_email', 'quiz_description', 'follow_description', 'course_assign_email', 'course_complete_email'));
    }

    public function competency(Request $request)
    {
        $competency = Setting::where('key', 'competency')->first();
        $levels = [];
        $errors['competency'] = [];
        if (count($request->labels) !== count(array_unique($request->labels))) {
            $errors['competency'][] = 'Labels should be unique';
        }
        foreach ($request->labels as $key => $label) {
            if (!empty($label) && isset($request->mins[$key]) && isset($request->maxes[$key])) {
                $levels[] = [
                    'label' => $label,
                    'min' => $request->mins[$key],
                    'max' => $request->maxes[$key],
                ];
            } else {
                if (empty($label)) {
                    $errors['competency'][] = 'Label cannot be empty in row '.($key + 1);
                }
                if (!isset($request->mins[$key])) {
                    $errors['competency'][] = 'Lower Point cannot be empty in row '.($key + 1);
                }
                if (!isset($request->maxes[$key])) {
                    $errors['competency'][] = 'Higher Point cannot be empty in row '.($key + 1);
                }
            }
        }
        if (count($errors['competency'])) {
            throw \Illuminate\Validation\ValidationException::withMessages($errors);
        }
        if (count($levels) <= 0) {
            $errors = [
                'competency' => [
                    'You have to select at least one competency level',
                ],
            ];
            throw \Illuminate\Validation\ValidationException::withMessages($errors);
        }
        foreach ($levels as $level) {
            if ($level['min'] > $level['max']) {
                $errors['competency'][] = 'Lower Point cannot be greater than Higher Point in row '.($key + 1);
            }
        }
        if (count($errors['competency'])) {
            throw \Illuminate\Validation\ValidationException::withMessages($errors);
        }
        for ($i = 0; $i < 100; ++$i) {
            $found = 0;
            foreach ($levels as $level) {
                if ($i <= $level['max'] && $i >= $level['min']) {
                    ++$found;
                }
            }
            if (!$found) {
                $start = $i;
                $end = $i;
                for ($end = $start; $end <= 100; ++$end) {
                    $end_found = false;
                    foreach ($levels as $level) {
                        if ($end <= $level['max'] && $end >= $level['min']) {
                            $end_found = true;
                            break;
                        }
                    }
                    if ($end_found) {
                        break;
                    }
                }
                --$end;
                $errors['competency'][] = 'Range ('.$start.'-'.$end.') does not fall in any level';
                $i = $end;
            } elseif ($found > 1) {
                $errors['competency'][] = 'Some levels overlap each other';
            }
        }
        if (count($errors['competency'])) {
            throw \Illuminate\Validation\ValidationException::withMessages($errors);
        }
        Setting::create([
            'key' => 'competency',
            'value' => json_encode($levels),
        ]);

        return redirect()->back()->with('success', 'Competency updated Successfully')->withInput($request->all());
    }

    public function examAssignEmail(Request $request)
    {
        $this->validate($request, [
            'exam_assign_email' => 'required',
        ]);

        $exam_assign_email = Setting::where('key', 'exam_assign_email')->first();
        if (empty($exam_assign_email)) {
            Setting::create([
                'key' => 'exam_assign_email',
                'value' => $request->exam_assign_email,
            ]);
        } else {
            $exam_assign_email->value = $request->exam_assign_email;
            $exam_assign_email->save();
        }

        return redirect()->back()->with('success', 'Email updated Successfully')->withInput($request->all());
    }

    public function examCompleteEmail(Request $request)
    {
        $this->validate($request, [
            'exam_complete_email' => 'required',
        ]);

        $exam_complete_email = Setting::where('key', 'exam_complete_email')->first();
        if (empty($exam_complete_email)) {
            Setting::create([
                'key' => 'exam_complete_email',
                'value' => $request->exam_complete_email,
            ]);
        } else {
            $exam_complete_email->value = $request->exam_complete_email;
            $exam_complete_email->save();
        }

        return redirect()->back()->with('success', 'Email updated Successfully')->withInput($request->all());
    }

    public function courseAssignEmail(Request $request)
    {
        $this->validate($request, [
            'course_assign_email' => 'required',
        ]);

        $course_assign_email = Setting::where('key', 'course_assign_email')->first();
        if (empty($course_assign_email)) {
            Setting::create([
                'key' => 'course_assign_email',
                'value' => $request->course_assign_email,
            ]);
        } else {
            $course_assign_email->value = $request->course_assign_email;
            $course_assign_email->save();
        }

        return redirect()->back()->with('success', 'Email updated Successfully')->withInput($request->all());
    }

    public function courseCompleteEmail(Request $request)
    {
        $this->validate($request, [
            'course_complete_email' => 'required',
        ]);

        $course_complete_email = Setting::where('key', 'course_complete_email')->first();
        if (empty($course_complete_email)) {
            Setting::create([
                'key' => 'course_complete_email',
                'value' => $request->course_complete_email,
            ]);
        } else {
            $course_complete_email->value = $request->course_complete_email;
            $course_complete_email->save();
        }

        return redirect()->back()->with('success', 'Email updated Successfully')->withInput($request->all());
    }

    public function quizDetails(Request $request)
    {
        $this->validate($request, [
            'quiz_description' => 'required',
        ]);

        $quiz_description = Setting::where('key', 'quiz_description')->first();
        if (empty($quiz_description)) {
            Setting::create([
                'key' => 'quiz_description',
                'value' => $request->quiz_description,
            ]);
        } else {
            $quiz_description->value = $quiz_description;
            $quiz_description->save();
        }

        return redirect()->back()->with('success', 'Exam Module description updated Successfully')->withInput($request->all());
    }

    public function followDetails(Request $request)
    {
        $this->validate($request, [
            'follow_description' => 'required',
        ]);

        $follow_description = Setting::where('key', 'follow_description')->first();
        if (empty($follow_description)) {
            Setting::create([
                'key' => 'follow_description',
                'value' => $request->follow_description,
            ]);
        } else {
            $follow_description->value = $request->follow_description;
            $follow_description->save();
        }

        return redirect()->back()->with('success', 'Follow Description Successfully')->withInput($request->all());
    }
}
