<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ExamUser;
use App\Models\Team;
use DB;

class ExamResultExport implements FromQuery, Responsable, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Exam Result Export.xlsx';

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        // dd($this->request->team_id);
        $request = $this->request;
        $query = ExamUser::join('users', 'exam_user.user_id', 'users.id')
            ->join('exams', 'exam_user.exam_id', 'exams.id')
            ->join('statuses', 'exam_user.status_id', 'statuses.id')
            ->leftJoin('divisions', 'divisions.id', 'users.division_id')
            ->leftJoin('departments', 'departments.id', 'users.department_id')
            ->leftJoin('units', 'units.id', 'users.unit_id')
            ->where('exam_user.status_id', 5)
            ->select([
            'exam_user.id',
            'exam_user.user_id',
            'exams.title as exam_title',
            'users.name as user_name',
            'users.username',
            'statuses.display_name as status',
            'exam_user.state',
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
            $query = $query->where('divisions.id', $request->division_id);
        }

        if ($request->department_id) {
            $query = $query->where('departments.id', $request->department_id);
        }

        if ($request->unit_id) {
            $query = $query->where('units.id', $request->unit_id);
        }

        return $query;
    }

    public function map($exam): array
    {
        if (!empty($exam->state['no_of_questions_answered'])) {
            $no_of_passed_answers = $exam->state['no_of_questions_answered']
            - ($exam->state['no_of_correct_answers']
            + $exam->state['no_of_wrong_answers']);
        }

        if ('7' == $this->request->status_id || '3' == $this->request->status_id) {
            return [
                $exam->user->name,
                $exam->exam_title,
                $exam->username,
                $exam->user->teams()->pluck('name')->implode(', '),
                $exam->started_at->format('d-M-Y'),
                $exam->ended_at->format('d-M-Y'),
                $exam->status,
            ];
        } else {
            return [
                $exam->user->name,
                $exam->exam_title,

                $exam->username,
                $exam->user->teams()->pluck('name')->implode(', '),

                empty($exam->state['no_of_correct_answers']) ? '0' : $exam->state['no_of_correct_answers'],
                empty($exam->state['no_of_wrong_answers']) ? '0' : $exam->state['no_of_wrong_answers'],
                empty($no_of_passed_answers) ? '0' : $no_of_passed_answers,
                empty($exam->state['time_spent']) ? '0' : $exam->state['no_of_questions_answered'],
                empty($exam->state['scorePercent']) ? '0' : $exam->state['scorePercent'],

                empty($exam->state['grade']) ? '' : $exam->state['grade'],
                $exam->started_at->format('d-M-Y'),
                $exam->ended_at->format('d-M-Y'),
                $exam->status,
            ];
        }
    }

    public function headings(): array
    {
        if ('7' == $this->request->status_id || '3' == $this->request->status_id) {
            return ['Name', 'Exam Title', 'User ID', 'Team', 'Start Time', 'End Time', 'Status'];
        } else {
            return ['Name', 'Exam Title', 'User ID', 'Team', 'Correct', 'Incorrect', 'Pass', 'Total attempt', 'Score%', 'Competency level', 'Start Time', 'End Time', 'Status'];
        }
    }
}
