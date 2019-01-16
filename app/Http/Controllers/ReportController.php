<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Exam;
use App\Models\Status;
use App\Models\User;
use App\Models\Division;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Group;
use App\Models\Team;
use App\Models\ExamUser;
use App\Exports\UserResultExport;
use App\Exports\ExamResultExport;
use App\Exports\IncompleteExamResultExport;
use App\Exports\UserStatusExport;
use DB;
class ReportController extends Controller
{
    public function userResult(Request $request)
    {
        $exams = Exam::pluck('title', 'id');
        $users = User::where('is_active', true)
            ->where('username', '!=', 'sa')
            ->select(\DB::raw("CONCAT(CONCAT(CONCAT(name, ' ('), username), ')') AS name, id"), 'division_id', 'department_id', 'unit_id')
            ->pluck('name', 'id');
             
        return view('reports.user-result', compact('exams', 'users'));
    }

    public function userResultData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = ExamUser::join('users', 'exam_user.user_id', 'users.id')
            ->join('exams', 'exam_user.exam_id', 'exams.id')
            ->join('statuses', 'exam_user.status_id', 'statuses.id')
            ->select([
            'exam_user.id',
            'exam_user.state',
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

        if ($request->user_id) {
            $query = $query->where('exam_user.user_id', $request->user_id);
        }
        
        if($request->status_id !== null){
            $query = $query->where('users.is_active',$request->status_id);
        }

        $datatable = $datatables->eloquent($query)
            ->addColumn('state', function ($exam_user) {
                return $exam_user->state ? $exam_user->state : '';
            })
            ->make(true);

        return $datatable;
    }

    public function exportUserResult(Request $request)
    {

        if($request->status_id !== null)
        {
            return new UserStatusExport($request);
        }else{
            $request->validate([
            'user_id' => 'required',
            ]);
            return new UserResultExport($request);
        }


        
    }

    public function examResult()
    {
        $exams = Exam::pluck('title', 'id');
        $groups = Group::pluck('name', 'id');
        $teams = Team::select('name', 'id', 'group_id')->get('name', 'id');
        $divisions = Division::orderBy('name')->select('name', 'id')->get();
        $departments = Department::orderBy('name')->select('name', 'id', 'division_id')->get();
        $units = Unit::orderBy('name')->select('name', 'id', 'department_id', 'division_id')->get();
        $statuses = Status::where('whose','exam_user')->pluck('display_name','id');
        return view('reports.exams-result', compact('exams', 'groups', 'teams', 'divisions', 'departments', 'units','statuses'));
    }

    public function examResultData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = ExamUser::join('users', 'exam_user.user_id', 'users.id')
            ->join('exams', 'exam_user.exam_id', 'exams.id')
            ->join('statuses', 'exam_user.status_id', 'statuses.id')
        
            ->leftJoin('divisions', 'divisions.id', 'users.division_id')
            ->leftJoin('departments', 'departments.id', 'users.department_id')
            ->leftJoin('units', 'units.id', 'users.unit_id')
            ->leftJoin('statuses','statuses.id','exam_user.status_id')
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
            $query = $query->where('exam_user.exam_id', $request->exam_id);
        }

        if ($request->group_id) {
            $team_ids = Team::where('group_id', $request->group_id)->pluck('id');
            $user_ids = DB::table('team_user')->whereIn('team_id', $team_ids)->pluck('user_id');
            $query = $query->whereIn('exam_user.user_id', $user_ids);
        }

        if ($request->team_id) {
            $user_ids = DB::table('team_user')->where('team_id', $request->team_id)->pluck('user_id');
            $query = $query->where('teams.id', $request->team_id);
        }

        if ($request->division_id) {
            $query->where('divisions.id', $request->division_id);
        }

        if ($request->department_id) {
            $query->where('departments.id', $request->department_id);
        }

        if($request->status_id)
        {
            $query->where('statuses.id',$request->status_id);
        }

        if ($request->unit_id) {
            $query->where('units.id', $request->unit_id);
        }

        $datatable = $datatables->eloquent($query)
            ->make(true);

        return $datatable;
    }

    public function exportExamResult(Request $request)
    {        
        return new ExamResultExport($request);
    }

    public function exportIncompleteExamResult(Request $request)
    {
        return new IncompleteExamResultExport($request);   
    }
}
