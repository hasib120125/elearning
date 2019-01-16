<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ExamUser;
use App\Models\Question;

class ExamQuestionExport implements FromQuery, Responsable, WithMapping, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'Exam Question.xlsx';

    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function query()
    {
        $request = $this->request;
        $query = Question::select('*');
        //dd($query);
        if ($request->category_id) {
            $query = $query->where('questions.category_id', $request->category_id);
        }

        if ($request->type) {
            $query = $query->where('questions.type', $request->type);
        }

        if ($request->status_id) {
            $query = $query->where('questions.status_id', $request->status_id);
        }

        return $query;
    }

    public function map($questions): array
    {
        return [
            $questions->question,
            $questions->answer,
            $questions->stat['correct'].','.$questions->stat['incorrect'].','.
            $questions->stat['unanswered'].','.$questions->stat['unknown'].','.
            $questions->stat['appeared'],
            $questions->category->name,
            
            $questions->type,
            $questions->status->display_name,
        ];
    }

    public function headings(): array
    {
        return ['Title', 'Answer', 'Stat','Category','Type','Status'];
    }
}