<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;
use App\Models\Exam;
use App\Models\Team;
use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Status;
use App\Models\Setting;
use App\Models\Division;
use App\Models\ExamUser;
use App\Models\Question;
use App\Mail\ExamAssigned;
use App\Models\CourseUser;
use App\Models\Department;
use App\Models\CourseExtra;
use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use Yajra\Datatables\Datatables;
use App\Exports\ExamStatusExport;
use App\Exports\IncompleteExamResultExport;
use Illuminate\Database\Eloquent\Collection;

class LiveStreamController extends Controller
{
    public function index()
    {
        return view('livestreams.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Exam::with('status')
            ->select('exams.*');
        if ('sa' != auth()->user()->username) {
            $query = $query->where('created_by', auth()->user()->id);
        }

        return $datatables->eloquent($query)
            ->addColumn('action', function ($exam) {
                return view('liveclass.actions', ['exam' => $exam]);
            })
            ->addColumn('no_of_questions', function ($exam) {
                return DB::table('exam_question_category')
                    ->where('exam_id', '=', $exam->id)
                    ->sum('no_of_questions');
            })
            ->addColumn('status', function ($exam) {
                return $exam->status->display_name;
            })
            ->addColumn('expired_at', function ($exam) {
                return $exam->expired_at->toDateString();
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $statuses = Status::where('whose', 'exam')
            ->orderBy('display_order')
            ->get();

        $categories = QuestionCategory::orderBy('name')->get();

        return view('exams.create', [
            'statuses' => $statuses,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'expired_at' => 'required',
            'status_id' => 'required',
            'duration' => 'required',
            'score' => 'required',
            'description' => 'required',
        ], [
          'expired_at.required' => 'Expiry Date is required',
          'exams.required' => 'You should select at least one exam',
        ]);
        $request->merge(['expired_at' => Carbon::parse($request->expired_at)->endOfDay()->toDateTimeString()]);
        $exam = new Exam();

        $exam->fill($request->all());
        $exam->total_no_of_questions = array_sum($request->no_of_questions);
        $exam->save();
        $category_exams = [];
        foreach ($request->category_ids as $key => $category_id) {
            if (!empty($category_id)) {
                $category_exams[$category_id] = [
                    'no_of_questions' => $request->no_of_questions[$key],
                ];
            }
        }
        $exam->categories()->attach($category_exams);

        $exam_questions = [];
        foreach ($exam->categories as $category) {
            $query = Question::where('category_id', $category->id)
                    ->where('status_id', 8)
                    ->where('created_by', auth()->user()->id)
                    ->take($category->pivot->no_of_questions);
            if(config('database.default') == 'oracle'){
                $query = $qusery->orderBy(DB::raw('dbms_random.value'));
            }
            if(env('database.default') == 'mysql'){
                $query = $query->inRandomOrder();
            }
            $rand_questions = $query->pluck('id')->toArray();
            $exam_questions = array_merge($rand_questions, $exam_questions);
        }
        $exam->questions()->attach($exam_questions);

        return redirect()->back()->with('success', 'Exam Created Successfully');
    }

    public function show(Request $request, $id)
    {
        $exam = Exam::with(['users' => function ($query) {
            $query->where('users.id', auth()->user()->id);
        }])
        ->find($id);

        return $exam;
    }

    public function edit($id)
    {
        $exam = Exam::find($id);

        $statuses = Status::where('whose', 'exam')
            ->orderBy('display_order')
            ->get();

        $categories = QuestionCategory::orderBy('name')->get();

        return view('exams.edit', [
            'exam' => $exam,
            'statuses' => $statuses,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'expired_at' => 'required',
            'status_id' => 'required',
            'description' => 'required',
        ], [
          'expired_at.required' => 'Expiry Date is required',
        ]);
        $request->merge(['expired_at' => Carbon::parse($request->expired_at)->endOfDay()->toDateTimeString()]);
        $exam = Exam::find($id);
        //dd($request->all());
        $exam->fill($request->all());

        $exam->allow_previous = $request->allow_previous ? true : false;
        $exam->allow_result_mail = $request->allow_result_mail ? true : false;
        $exam->save();

        return redirect()->back()->with('success', 'Exam Updated Successfully');
    }

    public function saveState(Request $request)
    {
    }

    public function delete($id)
    {
        $exam = Exam::find($id);

        return view('liveclass.delete', ['exam' => $exam]);
    }

    public function destroy($id)
    {
        $exam = Exam::find($id);
        DB::table('exam_question_category')->where('exam_id', $id)->delete();
        DB::table('exam_question')->where('exam_id', $id)->delete();
        $exam_users = ExamUser::where('exam_id', $id)->get();
        DB::table('exam_user_question')->whereIn('exam_user_id', $exam_users->pluck('id')->toArray())->delete();
        DB::table('exam_user')->where('exam_id', $id)->delete();
        $exam->delete();

        return redirect()->back()->with('success', 'Exam deleted Successfully');
    }

    public function getAssignmentForm()
    {
        $exams = Exam::where('status_id', 1)->pluck('title', 'id');
        $divisions = Division::orderBy('name')->select('name', 'id')->get();
        $departments = Department::orderBy('name')->select('name', 'id', 'division_id')->get();
        $units = Unit::orderBy('name')->select('name', 'id', 'department_id', 'division_id')->get();
        $users = User::where('is_active', true)
            ->where('username', '!=', 'sa')
            ->select(\DB::raw("CONCAT(CONCAT(CONCAT(name, ' ('), username), ')') AS name, id"), 'division_id', 'department_id', 'unit_id')
            ->get();
        $groups = Group::orderBy('name')
            ->select('name', 'id')
            ->get();
        $teams = Team::orderBy('name')
            ->select('name', 'id', 'group_id')
            ->with(['users' => function ($query) {
                $query->select('users.id');
            }])
            ->get();
        $email_body = Setting::where('key', 'exam_assign_email')->first();
        $email_body = $email_body ? $email_body->value : '';

        return view('liveclass.assign', compact('divisions', 'departments', 'units', 'users', 'groups', 'teams', 'exams', 'email_body'));
    }

    public function assign(Request $request)
    {
        $this->validate($request, [
            'exam_id' => 'required',
        ], [
          'exam_id.required' => 'Please select an exam',
        ]);
        $exam = Exam::find($request->exam_id);
        $this->validate($request, [
            'started_at' => 'required',
            'ended_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $exam) {
                    if (!empty($request->started_at) && !empty($request->ended_at)) {
                        $started_at = Carbon::parse($request->started_at);
                        $ended_at = Carbon::parse($request->ended_at);
                        if ($started_at->gt($ended_at)) {
                            return $fail('End date should be greater than start date');
                        } elseif ($ended_at->gt($exam->expired_at)) {
                            return $fail('End date Exceeds expiry date');
                        }
                    }
                },
            ],
        ], [
          'started_at.required' => 'Start Date is Required',
          'ended_at.required' => 'End Date is Required',
        ]);
        if (!empty($request->user_ids)) {
            $users = User::whereIn('id', $request->user_ids)->get();
        } elseif (!empty($request->team_id)) {
            $users = Team::find($request->team_id)->users()->get();
        } elseif (!empty($request->group_id)) {
            $teams = Group::find($request->group_id)->teams;
            $users = new Collection();
            foreach ($teams as $team) {
                $users = $users->merge($team->users);
            }
        } elseif (!empty($request->unit_id)) {
            $users = Unit::find($request->unit_id)->users()->get();
        } elseif (!empty($request->department_id)) {
            $users = Department::find($request->department_id)->users()->get();
        } elseif (!empty($request->division_id)) {
            $users = Division::find($request->division_id)->users()->get();
        }
        if (empty($users)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'user_ids' => ['Please select at least a user, team, division, department or unit'],
            ]);
            throw $error;
        }
        $exam_users = [];
        foreach ($users as $user) {
            $exam_users[$user->id] = [
                'started_at' => $request->started_at,
                'ended_at' => $request->ended_at,
                'status_id' => 3,
                'email_body' => $request->email_body,
            ];
            Mail::send(new LiveclassAssigned($user, $exam, $request->started_at, $request->ended_at, $request->email_body));
        }
        $test = $exam->users()->attach($exam_users);

        return redirect()->back()->with('success', 'Exam Assigned Successfully');
    }

    public function getByExamUserId($id)
    {
        return ExamUser::find($id)->exam;
    }

    public function take(Request $request, $id)
    {
        $exam_user = ExamUser::with('questions')->find($id);
        $exam = $exam_user->exam()->with(['questions' => function ($query) {
            $query->orderBy('id');
        }])->first();
        $exam->pivot = $exam_user;
        if (!session('isExamStarted'.$id) && in_array($exam_user->status_id, [3, 4])) {
            if (4 == $exam_user->status_id) {
                session([
                    'exam_user_id'.$id => $exam_user->id,
                    'exam'.$id => $exam,
                    'isExamStarted'.$id => true,
                    'examStartTime'.$id => $exam_user->taken_at,
                    'curQuesNo'.$id => $exam_user->state['curQuesNo'],
                ]);
            } else {
                session([
                    'exam_user_id'.$id => $exam_user->id,
                    'exam'.$id => $exam,
                    'isExamStarted'.$id => true,
                    'examStartTime'.$id => Carbon::now(),
                    'curQuesNo'.$id => 1,
                ]);

                $exam_user->taken_at = Carbon::now();
                $exam_user->status_id = 4;
                $state = $exam_user->state;
                $state['curQuesNo'] = 1;
                $exam_user->state = $state;
                $exam_user->save();
                \App\Jobs\FinishExam::dispatch($exam_user)->delay(now()->addMinutes($exam->duration));
            }
        }
        $exam->startTime = session('examStartTime'.$id);
        $exam->remaining = $exam->duration * 60 - Carbon::now()->diffInSeconds($exam->startTime);
        $exam->curQuesNo = session('curQuesNo'.$id, 1);

        return $exam;
    }

    public function answer(Request $request, $id)
    {
        $exam_user = ExamUser::find($id);
        $user = $exam_user->user;
        $exam = $exam_user->exam;
        $state = $exam_user->state;
        $exam_user->state = $state;
        $exam_user->save();
        $exam_user_question = $exam_user->questions()->where('question_id', $request->question_id);

        $exam_user_question->sync([
            $request->question_id => [
                'answer' => 'objective' == $exam->type ? json_encode($request->answer) : $request->answer,
            ],
        ], false);
    }

    public function setCurQuesNo(Request $request, $id)
    {
        $exam_user = ExamUser::find($id);
        $exam = $exam_user->exam;
        session(['curQuesNo'.$id => $request->curQuesNo]);
        $state = $exam_user->state;
        $state['curQuesNo'] = session('curQuesNo'.$id);
        $exam_user->state = $state;
        $exam_user->save();
    }

    public function setLastActiveTime(Request $request, $id)
    {
        $exam_user = ExamUser::find($id);
        $state = $exam_user->state;
        $state['current_time'] = Carbon::now()->toDateTimeString();
        $exam_user->state = $state;
        $exam_user->save();
    }

    public function submit(Request $request, $id)
    {
        if (session('isExamStarted'.$id)) {
            session()->forget('exam'.$id);
            session()->forget('isExamStarted'.$id);
            session()->forget('examStartTime'.$id);
            session()->forget('curQuesNo'.$id);
            session()->forget('exam_user_id'.$id);
        }
        $exam_user = ExamUser::find($id);
        $user = $exam_user->user;
        $exam = $exam_user->exam;
        $answers = [];
        $answered_questions = [];
        $no_of_correct_answers = 0;
        $no_of_wrong_answers = 0;
        foreach ($request->answers as $question_id => $answer) {
            if (!empty($answer)) {
                $question = Question::find($question_id);
                $stat = $question->stat;
                ++$stat['appeared'];
                if ('descriptive' == $exam->type && $question->answer == $answer) {
                    ++$no_of_correct_answers;
                } elseif ('objective' == $exam->type) {
                    $right_options = json_decode($question->answer);
                    if (empty(array_diff($right_options, $answer)) && empty(array_diff($answer, $right_options))) {
                        ++$no_of_correct_answers;
                        ++$stat['correct'];
                    } elseif (in_array("I Don't Know", $answer)) {
                        ++$stat['unknown'];
                    } else {
                        ++$no_of_wrong_answers;
                        ++$stat['incorrect'];
                    }
                    $answered_questions[] = $question_id;
                }
                $question->stat = $stat;
                $question->save();
                $answers[$question_id] = [
                    'answer' => 'objective' == $exam->type ? json_encode($answer) : $answer,
                ];
            }
        }
        foreach ($exam->questions->whereNotIn('questions.id', $answered_questions) as $question) {
            $stat = $question->stat;
            ++$stat['unanswered'];
            $question->stat = $stat;
            $question->save();
        }
        $no_of_questions = $exam->total_no_of_questions;
        if ($exam->allow_negative_mark) {
            $per_question_mark = $exam->score / $no_of_questions;

            $per_question_negative_mark = $per_question_mark * $exam->negative_mark_weight / 100;

            $score = round($per_question_mark * $no_of_correct_answers - $per_question_negative_mark * $no_of_wrong_answers, 2);
        } else {
            $score = round($exam->score / $no_of_questions * $no_of_correct_answers, 2);
        }

        $exam_user->completed_at = Carbon::now();

        $exam_user->state = [
            'time_spent' => $exam_user->completed_at->diffInSeconds($exam_user->taken_at),
            'no_of_questions_answered' => count($request->answers),

            'score' => $score,
            'no_of_correct_answers' => $no_of_correct_answers,
            'no_of_wrong_answers' => $no_of_wrong_answers,
            'scorePercent' => round(100 / $exam->score * $score),
            'grade' => $this->calculateGrade($score / $exam->score),
        ];
        $exam_user->status_id = 5;
        $exam_user->save();
        $exam_user->questions()->sync(
            $answers
        );
        Mail::send(new ExamComplete($user, $exam));
    }

    public function finish(Request $request, $id)
    {
        $exam = Exam::whereHas('users', function ($query) use ($id) {
            $query->where('exam_user.id', $id);
        })
        ->with(['users' => function ($query) use ($id) {
            $query->where('exam_user.id', $id);
        }])
        ->with('questions')->first();
        
        $exam_user = ExamUser::where('exam_id', $exam->id)
        ->where('user_id', auth()->user()->id)->first();

        $course_user = CourseUser::where('exam_user_id', $exam_user->id)->first();

        $course_extra = DB::table('course_extras')->first();

        $has_certificate = $exam_user->state['score'] >= $course_extra->threshold_mark;
        if($has_certificate == true){
            $course = $course_user->course_id;
        }

        $exam->$has_certificate;

        $exam->users->first()->pivot->load('questions');
        
        return $exam;
    }

    public function status(Request $request)
    {
        $exams = Exam::pluck('title', 'id');
        $statuses = Status::where('whose', 'exam_user')->pluck('display_name', 'id');

        return view('exams.status', compact('exams', 'statuses'));
    }

    public function statusData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = ExamUser::join('users', 'exam_user.user_id', 'users.id')
            ->join('exams', 'exam_user.exam_id', 'exams.id')
            ->join('statuses', 'exam_user.status_id', 'statuses.id')
            ->select([
                'exam_user.id',
                'exam_user.status_id',
                'exams.title as exam_title',
                'users.name as user_name',
                'users.username',
                'statuses.display_name as status',
                'exam_user.started_at as started_at',
                'exam_user.ended_at as ended_at',
            ]);

        if ($request->start_date) {
            $query = $query->whereBetween('exam_user.created_at', [$request->start_date, $request->end_date]);
        }
        if ($request->exam_id) {
            $query = $query->where('exams.id', $request->exam_id);
        }
        if ($request->status_id) {
            $query = $query->where('statuses.id', $request->status_id);
        }
        $datatable = $datatables->eloquent($query)
            ->addColumn('action', function ($exam_user) {
                return view('exams.status-actions', ['exam_user' => $exam_user]);
            })
            ->make(true);

        return $datatable;
    }

    public function pending($user_id = null)
    {
        if (!$user_id) {
            $user = auth()->user();
        } else {
            $user = auth()->user();
        }

        return $user->exams()->whereIn('exam_user.status_id', [3, 4])->get();
    }

    public function completed($user_id = null)
    {
        if (!$user_id) {
            $user = auth()->user();
        } else {
            $user = auth()->user();
        }

        return $user->exams()->where('exam_user.status_id', '=', 5)->orderBy('exam_user.completed_at', 'DESC')->get();
    }

    public function dates($id)
    {
        return Exam::where('id', $id)->select(['started_at', 'ended_at'])->first();
    }

    public function changeStatus($id)
    {
        $exam_user = DB::table('exam_user')->where('id', '=', $id)->first();
        if ($exam_user) {
            if (7 == $exam_user->status_id) {
                $exam_user->status_id = 3;
            } elseif (3 == $exam_user->status_id) {
                $exam_user->status_id = 7;
            }
            $exam_user->save();
        }
    }

    public function mark(Request $request)
    {
        $exam_user = ExamUser::where('exam_id', $request->exam_id)
            ->where('user_id', $request->user()->id)
            ->first();
        if (!empty($exam_user)) {
            $exam_user->status_id = 7;
            $exam_user->save();
        }
    }

    public function report()
    {
        return view('exams.report');
    }

    public function reportData(Datatables $datatables)
    {
        $query = DB::table('exams')
            ->join('exam_exam_exam', 'exam_exam_exam.exam_id', 'exams.id')
            ->join('exam_exams', 'exam_exam_exam.exam_id', 'exam_exams.id')
            ->join('exam_exams', 'exam_exam_exam.exam_id', 'exam_exams.id');
    }

    private function calculateGrade($score)
    {
        $score = round($score * 100);
        $competency = Setting::where('key', 'competency')->first();
        $levels = json_decode($competency->value);
        foreach ($levels as $level) {
            if ($score >= $level->min && $score <= $level->max) {
                return $level->label;
            }
        }

        return null;
    }

    public function showChangeTimeForm($id)
    {
        $exam_user = ExamUser::find($id);

        return view('exams.change-time', compact('exam_user'));
    }

    public function changeTime(Request $request, $id)
    {
        $exam_user = Examuser::find($id);
        $exam = $exam_user->exam;
        $this->validate($request, [
            'started_at' => 'required',
            'ended_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $exam) {
                    if (!empty($request->started_at) && !empty($request->ended_at)) {
                        $started_at = Carbon::parse($request->started_at);
                        $ended_at = Carbon::parse($request->ended_at);
                        if ($started_at->gt($ended_at)) {
                            return $fail('End date should be greater than start date');
                        } elseif ($ended_at->gt($exam->expired_at)) {
                            return $fail('End date Exceeds expiry date');
                        }
                    }
                },
            ],
        ], [
          'started_at.required' => 'Start Date is Required',
          'ended_at.required' => 'End Date is Required',
        ]);
        $exam_user->started_at = $request->started_at;
        $exam_user->ended_at = $request->ended_at;
        $exam_user->save();

        return redirect()->route('exams.status')->with('success', 'Exam Time Updated Successfully');
    }

    public function export(Request $request)
    {
        return new ExamStatusExport($request);
    }

    public function exportIncompleteExamResult(Request $request)
    {
        return new IncompleteExamResultExport($request);
    }
}
