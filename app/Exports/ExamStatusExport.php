<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ExamUser;

class ExamStatusExport implements FromQuery, Responsable, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Exam Status.xlsx';

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $request = $this->request;
        $query = ExamUser::join('users', 'exam_user.user_id', 'users.id')
            ->join('exams', 'exam_user.exam_id', 'exams.id')
            ->join('statuses', 'exam_user.status_id', 'statuses.id')
            ->select([
            'exam_user.id',
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

        return $query;
    }

    public function map($exam): array
    {
        return [
            $exam->exam_title,
            $exam->user_name,
            $exam->username,
            $exam->started_at->format('d-M-Y'),
            $exam->ended_at->format('d-M-Y'),
            $exam->status,
        ];
    }

    public function headings(): array
    {
        return ['Title', 'Name', 'Login Id', 'Start Date', 'End Date', 'Status'];
    }
}
