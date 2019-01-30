<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Image;
use Storage;
use Carbon\Carbon;
use App\Models\Team;
use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Status;
use App\Models\Setting;
use App\Models\Division;
use App\Models\Liveclass;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\LiveclassUser;
use App\Mail\LiveclassAssigned;
use Yajra\Datatables\Datatables;
use Illuminate\Database\Eloquent\Collection;

class LiveclassController extends Controller
{
    public function index(){
    	return view('lives.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Liveclass::select('liveclasses.*');

        return $datatables->eloquent($query)
            ->addColumn('title', function ($liveclass) {
                return $liveclass->title;
            })

            ->addColumn('description', function ($liveclass) {
                return $liveclass->description;
            })

            ->addColumn('created_at', function ($liveclass) {
                return $liveclass->created_at;
            })

            ->addColumn('updated_at', function ($liveclass) {
                return $liveclass->updated_at;
            })
        
            ->addColumn('status', function ($liveclass) {
                return $liveclass->status->display_name;
            })

            ->addColumn('duration', function ($liveclass) {
                return $liveclass->duration;
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
        $live = Liveclass::find($id);

        $statuses = Status::where('whose', 'liveclass')->orderBy('display_order')->pluck('display_name', 'id');

        return view('lives.edit', [
            'live' => $live,
            'statuses' => $statuses,
        ]);
    }

    public function update(Request $request, $id)
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

        $live = Liveclass::find($id);
        $live->update($request->all());

        return redirect()->back()->with('success', 'Liveclass Updated Successfully');
    }

    public function delete($id)
    {
        $live = Liveclass::find($id);

        return view('lives.delete', ['live' => $live]);
    }

    public function destroy($id)
    {
        $live = Liveclass::find($id);
        $live->delete();

        return redirect()->back()->with('success', 'Liveclass Delete Successfully');
    }
    
    public function showAssignmentForm()
    {
        $liveClass = Liveclass::where('status_id', 21)->pluck('title', 'id');
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

        return view('lives.assign', compact('divisions', 'departments', 'units', 'users', 'groups', 'teams', 'liveClass', 'email_body'));
    }

    public function assign(Request $request)
    {
        $this->validate($request, [
            'live_id' => 'required',
        ], [
          'live_id.required' => 'Please select an Liveclass',
        ]);
        $liveclass = Liveclass::find($request->live_id);
        $this->validate($request, [
            'started_at' => 'required',
            'ended_at' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $liveclass) {
                    if (!empty($request->started_at) && !empty($request->ended_at)) {
                        $started_at = Carbon::parse($request->started_at);
                        $ended_at = Carbon::parse($request->ended_at);
                        if ($started_at->gt($ended_at)) {
                            return $fail('End date should be greater than start date');
                        } elseif ($ended_at->gt($liveclass->created_at)) {
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
        } 
        if (empty($users)) {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'user_ids' => ['Please select at least a user, team, division, department or unit'],
            ]);
            throw $error;
        }
        $liveclass_user = [];
        foreach ($users as $user) {
            $liveclass_user[$user->id] = [
                'started_at' => $request->started_at,
                'ended_at' => $request->ended_at,
                'status_id' => 23,
                'email_body' => $request->email_body,
            ];
            Mail::send(new LiveclassAssigned($user, $liveclass, $request->started_at, $request->ended_at, $request->email_body));
        }
        $test = $liveclass->users()->attach($liveclass_user);

        return redirect()->back()->with('success', 'Liveclass Assigned Successfully');
    }

    public function status()
    {
        $liveclass = LiveclassUser::pluck('id');
        $statuses = Status::where('whose', 'liveclass_users')->pluck('display_name', 'id');

        return view('lives.status', compact('statuses', 'liveclass'));
    }

    public function statusData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = LiveclassUser::join('users', 'liveclass_user.user_id', 'users.id')
            ->join('liveclasses', 'liveclass_user.liveclass_id', 'liveclasses.id')
            ->join('statuses', 'liveclass_user.status_id', 'statuses.id')
            ->select([
                'liveclass_user.id',
                'liveclass_user.status_id',
                'liveclasses.title as liveclass_title',
                'users.name as user_name',
                'users.username',
                'statuses.display_name as status',
                'liveclass_user.started_at as started_at',
                'liveclass_user.ended_at as ended_at',
            ]);

        if ($request->start_date) {
            $query = $query->whereBetween('liveclass_user.created_at', [$request->start_date, $request->end_date]);
        }
        if ($request->exam_id) {
            $query = $query->where('liveclasses.id', $request->liveclass_id);
        }
        if ($request->status_id) {
            $query = $query->where('statuses.id', $request->status_id);
        }
        $datatable = $datatables->eloquent($query)
            ->addColumn('action', function ($liveclass_user) {
                return view('lives.status-actions', ['liveclass_user' => $liveclass_user]);
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
