<?php

namespace App\Http\Controllers;

use App\CourseExtras;
use App\Exports\CourseUserExport;
use App\Mail\CourseAssigned;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Department;
use App\Models\Division;
use App\Models\ExamUser;
use App\Models\Group;
use App\Models\Setting;
use App\Models\Status;
use App\Models\Team;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Mail;
use Yajra\Datatables\Datatables;

class CourseUserController extends Controller
{
    public function showAssignmentForm()
    {
        $courses = Course::where('status_id', 11)->pluck('name', 'id');
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
        $email_body = Setting::where('key', 'course_assign_email')->first();
        $email_body = $email_body ? $email_body->value : '';
        $exam_email_body = Setting::where('key', 'exam_assign_email')->first();
        $exam_email_body = $exam_email_body ? $exam_email_body->value : '';

        return view('course-user.assign', compact('divisions', 'departments', 'units', 'users', 'groups', 'teams', 'courses', 'email_body', 'exam_email_body'));
    }

    public function assign(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
        ], [
          'course_id.required' => 'Please select an course',
        ]);
        $course = Course::find($request->course_id);

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
        $course_users = [];
        foreach ($users as $user) {
            $course_user = CourseUser::where('user_id', $user->id)->where('course_id', $course->id)->first();
            if (empty($course_user)) {
                if ($course->exam_id) {
                    $exam_user = ExamUser::create([
                        'exam_id' => $course->exam_id,
                        'user_id' => $user->id,
                        'status_id' => 7,
                        'email_body' => $request->exam_email_body,
                    ]);
                }
                $course_users[$user->id] = [
                    'started_at' => $request->started_at,
                    'ended_at' => $request->ended_at,
                    'status_id' => 13,
                    'email_body' => $request->email_body,
                    'is_admin_assigned' => true,
                    'exam_user_id' => empty($exam_user) ? null : $exam_user->id,
                ];
            } elseif (20 == $course_user->status_id) {
                $course_user->status_id = 13;
                if ($course->exam_id) {
                    $exam_user = ExamUser::create([
                        'exam_id' => $course->exam_id,
                        'user_id' => $user->id,
                        'status_id' => 7,
                        'email_body' => $request->exam_email_body,
                    ]);
                }
                $course_user->exam_user_id = empty($exam_user) ? null : $exam_user->id;
                $course_user->save();
            }

            Mail::send(new CourseAssigned($user, $course, $request->started_at, $request->ended_at, $request->email_body));
        }
        $test = $course->users()->attach($course_users);

        $course_exam = ExamUser::latest()->first();
        DB::table('course_extras')->where('course_id', $course->id)->update(['exam_user_id' => empty($exam_user) ? null : $exam_user->id]);

        return redirect()->back()->with('success', 'Course Assigned Successfully');
    }

    public function status()
    {
        $courses = Course::pluck('name', 'id');
        $statuses = Status::where('whose', 'course_user')->pluck('display_name', 'id');

        return view('course-user.status', compact('statuses', 'courses'));
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

        return view('course-user.change-time', compact('course_user'));
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
