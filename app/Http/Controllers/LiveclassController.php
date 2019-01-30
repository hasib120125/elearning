<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Storage;
use App\Models\Status;
use Yajra\Datatables\Datatables;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Mail;
use App\Models\Liveclass;
use App\Models\LiveclassUser;

class LiveclassController extends Controller
{
    public function index(){
    	return view('lives.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Liveclass::select('liveclasses.*');
        if ('sa' != auth()->user()->username) {
            $query = $query->where('created_by', auth()->user()->id);
        }

        return $datatables->eloquent($query)
            ->addColumn('title', function ($liveclass) {
                return $liveclass->title;
            })
        
            ->addColumn('status', function ($liveclass) {
                return $liveclass->status->display_name;
            })
            
            ->addColumn('action', function ($liveclass) {
                return view('lives.actions', compact('liveclass'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $statuses = Status::where('whose', 'liveclass')->orderBy('display_order')->pluck('display_name', 'id');

        return view('lives.create', [
            'statuses' => $statuses,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => [
              'required',
            ],
            'started_at' => 'required',
            'ended_at' => 'required',
            'status_id' => 'required',
        ], [
            'status_id.required' => 'Status is Required',
        ]);
        if ($request->validate) {
            return ['success' => true];
        }

        $liveClass = Liveclass::create($request->all());

        return redirect()->back()->with('success', 'Liveclass created Successfully');
    }

    public function edit($id)
    {
        $course = Course::with('topics.contents')->with('contents')->find($id);
        $skills = Skill::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');
        $statuses = Status::where('whose', 'course')->orderBy('display_order')->pluck('display_name', 'id');

        $difficulties = Difficulty::orderBy('display_order')->pluck('name', 'id');

        $exams = Exam::where('status_id', 1)->pluck('title', 'id');

        return view('lives.edit', [
            'course' => $course,
            'skills' => $skills,
            'statuses' => $statuses,
            'difficulties' => $difficulties,
            'exams' => $exams,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
              'required',
            ],
            'started_at' => 'required',
            'ended_at' => 'required',
            'status_id' => 'required',
            'skill_ids' => 'required',
        ], [
            'status_id.required' => 'Status is Required',
            'skill_ids.required' => 'At least one skill is Required',
        ]);
        if ($request->validate) {
            return ['success' => true];
        }
        $contents_sorted = 0;
        $course = Course::find($id);
        $course->update($request->all() + ['is_top' => $request->is_top ? true : false]);
        $course->skills()->sync($request->skill_ids);
        $course->topics()->whereNotIn('topics.id', $request->topic_id)->delete();
        $course->contents()->whereNotIn('contents.id', $request->content_id)->delete();
        foreach ($request->no_of_contents as $key => $no_of_contents_each_topic) {
            if (empty($request->topic_id[$key])) {
                $topic = Topic::create([
                    'name' => $request->topic_name[$key],
                    'description' => $request->topic_description[$key],
                    'course_id' => $course->id,
                    'display_order' => $key,
                ]);
            } else {
                $topic = Topic::find($request->topic_id[$key]);
                $topic->update([
                    'name' => $request->topic_name[$key],
                    'description' => $request->topic_description[$key],
                    'course_id' => $course->id,
                    'display_order' => $key,
                ]);
            }
            for ($i = 0; $i < $no_of_contents_each_topic; ++$i) {
                if (empty($request->content_id[$contents_sorted])) {
                    $content = Content::create([
                        'title' => $request->content_title[$contents_sorted],
                        'description' => $request->content_description[$contents_sorted],
                        'display_order' => $i,
                        'course_id' => $course->id,
                        'topic_id' => $topic->id,
                    ]);

                    if (!empty($request->file_id[$contents_sorted])) {
                        $file = ContentFile::find($request->file_id[$contents_sorted]);
                        $file->content_id = $content->id;
                        $file->save();
                    }
                } else {
                    $content = Content::find($request->content_id[$contents_sorted]);
                    $content->update([
                        'title' => $request->content_title[$contents_sorted],
                        'description' => $request->content_description[$contents_sorted],
                        'display_order' => $i,
                        'course_id' => $course->id,
                        'topic_id' => $topic->id,
                    ]);

                    if (!empty($content->file) && $content->file->id != $request->file_id[$contents_sorted]) {
                        Storage::delete($content->file->raw_name);
                        $content->file->delete();
                    }
                    if (!empty($request->file_id[$contents_sorted])) {
                        $file = ContentFile::find($request->file_id[$contents_sorted]);
                        $file->content_id = $content->id;
                        $file->save();
                    }
                }
                ++$contents_sorted;
            }
        }

        return redirect()->back()->with('success', 'Course Updated Successfully');
    }

    public function delete($id)
    {
        $course = Course::find($id);

        return view('lives.delete', ['course' => $course]);
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->back()->with('success', 'Course Delete Successfully');
    }
    
    public function showAssignmentForm()
    {
        $liveClass = Liveclass::where('status_id', 21)->pluck('title', 'id');
        $users = User::where('is_active', true)
            ->where('username', '!=', 'sa')
            ->select(\DB::raw("CONCAT(CONCAT(CONCAT(name, ' ('), username), ')') AS name, id"), 'division_id', 'department_id', 'unit_id')
            ->get();
        $email_body = Setting::where('key', 'course_assign_email')->first();
        $email_body = $email_body ? $email_body->value : '';
        $exam_email_body = Setting::where('key', 'exam_assign_email')->first();
        $exam_email_body = $exam_email_body ? $exam_email_body->value : '';

        return view('lives.assign', compact('users','liveClass', 'email_body', 'exam_email_body'));
    }

    public function assign(Request $request)
    {
        // $this->validate($request, [
        //     'live_id' => 'required',
        // ], [
        //   'live_id.required' => 'Please select an Liveclass',
        // ]);
        $liveclass = Liveclass::find($request->live_id);
        // $this->validate($request, [
        //     'started_at' => 'required',
        //     'ended_at' => [
        //         'required',
        //         function ($attribute, $value, $fail) use ($request, $liveclass) {
        //             if (!empty($request->started_at) && !empty($request->ended_at)) {
        //                 $started_at = Carbon::parse($request->started_at);
        //                 $ended_at = Carbon::parse($request->ended_at);
        //                 if ($started_at->gt($ended_at)) {
        //                     return $fail('End date should be greater than start date');
        //                 } elseif ($ended_at->gt($liveclass->created_at)) {
        //                     return $fail('End date Exceeds expiry date');
        //                 }
        //             }
        //         },
        //     ],
        // ], [
        //   'started_at.required' => 'Start Date is Required',
        //   'ended_at.required' => 'End Date is Required',
        // ]);
        if (!empty($request->user_ids)) {
            $users = User::whereIn('id', $request->user_ids)->get();
        } 
        if (empty($users)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'user_ids' => ['Please select at least a user, team, division, department or unit'],
            ]);
            throw $error;
        }
        $liveclass_users = [];
        foreach ($users as $user) {
            $liveclass_users[$user->id] = [
                'started_at' => $request->started_at,
                'ended_at' => $request->ended_at,
                'status_id' => 23,
                'email_body' => $request->email_body,
            ];
            //Mail::send(new ExamAssigned($user, $exam, $request->started_at, $request->ended_at, $request->email_body));
        }
        $test = $liveclass->users()->attach($liveclass_users);
        return redirect()->back()->with('success', 'Liveclass Assigned Successfully');
    }

    public function status()
    {
        $Liveclass = Liveclass::pluck('title', 'id');
        $statuses = Status::where('whose', 'liveclass_users')->pluck('display_name', 'id');

        return view('lives.status', compact('statuses', 'Liveclass'));
    }

    public function statusData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = CourseUser::join('users', 'course_user.user_id', 'users.id')
            ->join('courses', 'course_user.course_id', 'courses.id')
            ->join('statuses', 'course_user.status_id', 'statuses.id')
            ->select([
                'course_user.id',
                'course_user.status_id',
                'courses.name as course_name',
                'users.name as user_name',
                'users.username',
                'statuses.display_name as status',
                'course_user.started_at as started_at',
                'course_user.ended_at as ended_at',
            ]);

        if ($request->start_date) {
            $query = $query->whereBetween('course_user.created_at', [$request->start_date, $request->end_date]);
        }
        if ($request->course_id) {
            $query = $query->where('courses.id', $request->course_id);
        }
        if ($request->status_id) {
            $query = $query->where('statuses.id', $request->status_id);
        }
        $datatable = $datatables->eloquent($query)
            ->addColumn('action', function ($course_user) {
                return view('course-user.status-actions', ['course_user' => $course_user]);
            })
            ->make(true);

        return $datatable;
    }

    public function exprot(Request $request)
    {
        return new CourseUserExport($request);
    }

    public function showChangeTimeForm($id)
    {
        $course_user = CourseUser::find($id);

        return view('lives.change-time', compact('course_user'));
    }

    public function changeTime(Request $request, $id)
    {
        $course_user = CourseUser::find($id);
        $course = $course_user->course;
        $this->validate($request, [
            'started_at' => 'required',
            'ended_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $course) {
                    if (!empty($request->started_at) && !empty($request->ended_at)) {
                        $started_at = Carbon::parse($request->started_at);
                        $ended_at = Carbon::parse($request->ended_at);
                        if ($started_at->gt($ended_at)) {
                            return $fail('End date should be greater than start date');
                        } elseif ($ended_at->gt($course->ended_at)) {
                            return $fail('End date Exceeds expiry date');
                        }
                    }
                },
            ],
        ], [
          'started_at.required' => 'Start Date is Required',
          'ended_at.required' => 'End Date is Required',
        ]);
        $course_user->started_at = $request->started_at;
        $course_user->ended_at = $request->ended_at;
        $course_user->save();

        return redirect()->route('course-user.status')->with('success', 'Course Time Updated Successfully');
    }
}
