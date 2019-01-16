<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\CourseUser;

class CourseUserExport implements FromQuery, Responsable, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Assigned Course Status.xlsx';

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $request = $this->request;
        $query = CourseUser::join('users', 'course_user.user_id', 'users.id')
            ->join('courses', 'course_user.course_id', 'courses.id')
            ->join('statuses', 'course_user.status_id', 'statuses.id')
            ->select([
            'course_user.id',
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

        return $query;
    }

    public function map($course): array
    {
        return [
            $course->course_name,
            $course->user_name,
            $course->username,
            $course->started_at->format('d-M-Y'),
            $course->ended_at->format('d-M-Y'),
            $course->status,
        ];
    }

    public function headings(): array
    {
        return ['Course Name', 'Student Name', 'Login Id', 'Start Date', 'End Date', 'Status'];
    }
}
