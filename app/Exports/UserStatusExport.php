<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ExamUser;

class UserStatusExport implements FromQuery, Responsable, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'User Status.xlsx';

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
            ->where('users.is_active',$this->request->status_id)
            ->select([
            'exam_user.id',
            'exam_user.state',
            'exams.title as exam_title',
            'users.name as user_name',
            'users.username',

            'statuses.display_name as status',
            'exam_user.started_at as started_at',
            'exam_user.ended_at as ended_at',
        ]);

                
        return $query;
    }

    public function map($exam): array
    {
        return [
            $exam->exam_title,
            empty($exam->state['no_of_correct_answers']) ? '' : $exam->state['no_of_correct_answers'],
            empty($exam->state['no_of_wrong_answers']) ? '' : $exam->state['no_of_wrong_answers'],
            empty($exam->state['scorePercent']) ? '' : $exam->state['scorePercent'],
            empty($exam->state['grade']) ? '' : $exam->state['grade'],
            $exam->started_at->format('d-M-Y'),
            $exam->ended_at->format('d-M-Y'),
            $exam->status,
        ];
    }

    public function headings(): array
    {
        return ['Title', 'Correct', 'Incorrect', 'Score%', 'Competency level', 'Start Time', 'End Time', 'Status'];
    }
}