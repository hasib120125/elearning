<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\Status;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use App\Exports\ExamQuestionExport;
use DB;

class QuestionController extends Controller
{
    public function index()
    {
        $categories = QuestionCategory::pluck('name','id');
        $statuses = Status::where('whose','question')->pluck('display_name','id');

        return view('questions.index',compact('categories','statuses','types'));
    }

    public function indexData(Datatables $datatables)
    {

        $request = $datatables->getRequest();
        $query = Question::with('category')
            ->with('status')
            ->select('questions.*');

        if ($request->category_id) {
            $query = $query->where('questions.category_id', $request->category_id);
        }

        if($request->type){
            $query = $query->where('questions.type', $request->type);
        }

        if($request->status_id){
            $query = $query->where('questions.status_id',$request->status_id);
        }

        if ('sa' != auth()->user()->username) {
            $query = $query->where('created_by', auth()->user()->id);
        }
        return $datatables->eloquent($query)
            ->addColumn('status', function ($question) {
                return $question->status->display_name;
            })
            ->addColumn('action', function ($question) {
                return view('questions.actions', ['question' => $question]);
            })
            ->addColumn('stat', function ($question) {
                return view('questions.stat', ['stat' => $question->stat]);
            })
            ->rawColumns(['stat', 'action'])
            ->make(true);
    }

    public function create()
    {
        $categories = QuestionCategory::orderBy('name')
            ->pluck('name', 'id');

        return view('questions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'question' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'options' => [
              'required_if:type,objective',
              function ($attribute, $options, $fail) use ($request) {
                  if ('objective' == $request->type) {
                      if (count($options) < 2) {
                          return $fail('You should Select at least two options.');
                      }
                      foreach ($options as $option) {
                          if (empty($option)) {
                              return $fail("Options shouldn't be empty, remove unnecessary fields.");
                          }
                      }
                      if (empty($request->right_options)) {
                          return $fail('Please Select the correct Answer(s).');
                      }
                  }
              },
            ],
        ], [
          'category_id.required' => 'Please Select a Categry',
          'status_id.required' => 'Please Select a Status',
        ]);
        if ('objective' == $request->type) {
            $right_options = [];
            foreach ($request->right_options as $right_option) {
                $index = ord($right_option) - ord('A');
                array_push($right_options, $request->options[$index]);
            }
            $request->merge(['answer' => json_encode($right_options)]);
        }
        $question = Question::create($request->all());
        $question->stat = [
            'correct' => 0,
            'incorrect' => 0,
            'unanswered' => 0,
            'unknown' => 0,
            'appeared' => 0,
        ];
        $question->save();

        return redirect()->back()->with('success', 'Question Created Successfully');
    }

    public function edit($id)
    {
        $question = Question::find($id);
        if ('objective' == $question->type) {
            $question->option = 'B';
        }
        $categories = QuestionCategory::orderBy('name')
            ->pluck('name', 'id');

        return view('questions.edit', ['question' => $question, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'status_id' => 'required',
            'options' => [
              'required_if:type,objective',
              function ($attribute, $options, $fail) use ($request) {
                  if ('objective' == $request->type) {
                      if (count($options) < 2) {
                          return $fail('You should Select at least two options.');
                      }
                      foreach ($options as $option) {
                          if (empty($option)) {
                              return $fail("Options shouldn't be empty, remove unnecessary fields.");
                          }
                      }
                      if (empty($request->right_options)) {
                          return $fail('Please Select the correct Answer.');
                      }
                  }
              },
            ],
        ], [
          'category_id.required' => 'Please Select a Categry',
          'status_id.required' => 'Please Select a Status',
        ]);
        if ('objective' == $request->type) {
            $right_options = [];
            foreach ($request->right_options as $right_option) {
                $index = ord($right_option) - ord('A');
                array_push($right_options, $request->options[$index]);
            }
            $request->merge(['answer' => json_encode($right_options)]);
        }
        $question = Question::find($id);
        $question->update($request->all());
        if (empty($question->stat)) {
            $question->stat = [
                'correct' => 0,
                'incorrect' => 0,
                'unanswered' => 0,
                'unknown' => 0,
                'appeared' => 0,
            ];
            $question->save();
        }

        return redirect()->back()->with('success', 'Question Updated Successfully');
    }

    public function delete($id)
    {
        $question = Question::find($id);

        return view('questions.delete', ['question' => $question]);
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->back()->with('success', 'Question Deleted Successfully');
    }

    public function createBulk()
    {
        return view('questions.create-bulk');
    }

    public function storeBulk(Request $request)
    {
        if ($request->file('file')) {
            $worksheet = IOFactory::load($request->file('file'))->getSheet(0);
            $questions = [];
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 == $row->getRowIndex()) {
                    $attributes = $this->mapAttributes($row);
                    if (empty($attributes)) {
                        $error = \Illuminate\Validation\ValidationException::withMessages([
                            'file' => ['Template Error, please follow the format provided'],
                        ]);
                        throw $error;
                    }
                }
                if ($row->getRowIndex() > 1) {
                    $index = 0;
                    $question = [];
                    foreach ($row->getCellIterator() as $cell) {
                        if ($index >= count($attributes)) {
                            continue;
                        }
                        $attr = $attributes[$index++];
                        $question[$attr['db']]['value'] = (string) $cell->getValue();
                        $question[$attr['db']]['cell'] = $cell->getCoordinate();
                        $question[$attr['db']]['excel'] = $attr['excel'];
                        if ('expired_at' == $attr['db']) {
                            $question[$attr['db']]['value'] = (string) $cell->getFormattedValue();
                        }
                    }
                    array_push($questions, $question);
                }
            }
            if ($errors = $this->validateBulkAdd($questions)) {
                throw \Illuminate\Validation\ValidationException::withMessages($errors);
            }
            $categories = QuestionCategory::all();
            foreach ($questions as $key => $question) {
                foreach ($question as $prop => $value) {
                    $question[$prop] = $value['value'];
                }
                $category = $categories->where('name', '=', $question['category'])->first();

                $question['options'] = explode("\n", $question['options']);

                if ('objective' == $question['type']) {
                    $right_options = [];
                    $input = preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $question['answer']);
                    foreach ($input as $option) {
                        $right_options[] = $question['options'][$option - 1];
                    }
                    $question['answer'] = json_encode($right_options);
                }
                $question['category_id'] = $category->id;
                $question['expired_at'] = empty($question['expired_at']) ? null : Carbon::createFromFormat('j/n/Y', $question['expired_at'])->toDateTimeString();
                $question['status_id'] = 8;
                $question['stat'] = [
                    'correct' => 0,
                    'incorrect' => 0,
                    'unanswered' => 0,
                    'unknown' => 0,
                    'appeared' => 0,
                ];
                $question = Question::create($question);
            }

            return redirect()->back()->with('success', 'Questions created Successfully');
        }
        $error = \Illuminate\Validation\ValidationException::withMessages([
                'file' => ['Please Select a file'],
            ]);
        throw $error;
    }

    public function editBulk()
    {
        return view('questions.edit-bulk');
    }

    public function updateBulk(Request $request)
    {
        if ($request->file('file')) {
            $worksheet = IOFactory::load($request->file('file'))->getSheet(0);
            $questions = [];
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 == $row->getRowIndex()) {
                    $attributes = $this->mapAttributesUpdate($row);
                    if (empty($attributes)) {
                        $error = \Illuminate\Validation\ValidationException::withMessages([
                            'file' => ['Template Error, please follow the format provided'],
                        ]);
                        throw $error;
                    }
                }
                if ($row->getRowIndex() > 1) {
                    $index = 0;
                    $question = [];
                    foreach ($row->getCellIterator() as $cell) {
                        if ($index >= count($attributes)) {
                            continue;
                        }
                        $attr = $attributes[$index++];
                        $question[$attr['db']]['value'] = (string) $cell->getValue();
                        $question[$attr['db']]['cell'] = $cell->getCoordinate();
                        $question[$attr['db']]['excel'] = $attr['excel'];
                        if ('expired_at' == $attr['db']) {
                            $question[$attr['db']]['value'] = (string) $cell->getFormattedValue();
                        }
                    }
                    array_push($questions, $question);
                }
            }

            if ($errors = $this->validateBulkUpdate($questions)) {
                throw \Illuminate\Validation\ValidationException::withMessages($errors);
            }
            $categories = QuestionCategory::all();
            foreach ($questions as $key => $question) {
                foreach ($question as $prop => $value) {
                    $question[$prop] = $value['value'];
                }
                $category = $categories->where('name', '=', $question['category'])->first();

                $question['options'] = explode("\n", $question['options']);
                $question['question'] = empty($question['new_question']) ? $question['old_question'] : $question['new_question'];

                if ('objective' == $question['type']) {
                    $right_options = [];

                    $input = preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $question['answer']);
                    foreach ($input as $option) {
                        $right_options[] = $question['options'][$option - 1];
                    }
                    $question['answer'] = json_encode($right_options);
                }
                $question['category_id'] = $category->id;
                $question['expired_at'] = empty($question['expired_at']) ? null : Carbon::createFromFormat('j/n/Y', $question['expired_at'])->toDateTimeString();
                $question['status_id'] = 8;

                Question::where('question', $question['old_question'])->first()->update($question);
            }

            return redirect()->back()->with('success', 'Questions Updated Successfully');
        }
        $error = \Illuminate\Validation\ValidationException::withMessages([
                'file' => ['Please Select a file'],
            ]);
        throw $error;
    }

    private function mapAttributes($row)
    {
        $attribute_map = [
          'Question' => 'question',
          'Question Category' => 'category',
          'Question Type' => 'type',
          'Question Choices' => 'options',
          'Answer' => 'answer',
          'Expiry Date' => 'expired_at',
        ];
        $attributes = [];
        foreach ($row->getCellIterator() as $cell) {
            $value = $cell->getValue();
            if (!$value) {
                continue;
            }
            if (!isset($attribute_map[$value])) {
                return null;
            }
            $attributes[] = ['db' => $attribute_map[$value], 'excel' => $value];
        }

        return count($attributes) == count($attribute_map) ? $attributes : null;
    }

    private function mapAttributesUpdate($row)
    {
        $attribute_map = [
          'Existing Question' => 'old_question',
          'New Question' => 'new_question',
          'Question Category' => 'category',
          'Question Type' => 'type',
          'Question Choices' => 'options',
          'Answer' => 'answer',
          'Expiry Date' => 'expired_at',
        ];
        $attributes = [];
        foreach ($row->getCellIterator() as $cell) {
            $value = $cell->getValue();
            if (!$value) {
                continue;
            }
            if (!isset($attribute_map[$value])) {
                return null;
            }
            $attributes[] = ['db' => $attribute_map[$value], 'excel' => $value];
        }

        return count($attributes) == count($attribute_map) ? $attributes : null;
    }

    public function validateBulkAdd($questions)
    {
        $errors = [];
        $duplicates = [];
        foreach ($questions as $question) {
            foreach ($question as $attr => $props) {
                if ((!isset($props['value']) || '' == $props['value'])
                    && ('expired_at' != $attr && 'options' != $attr)
                    && ('answer' != $attr)) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' must not be empty'];
                }
                if ('options' == $attr && isset($question['type']['value']) && $question['type']['value'] == 'objective') {
                    if (count(explode("\n", $props['value'])) < 2) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' must specify at least two options'];
                    }
                }
                if ('answer' == $attr && isset($question['type']['value']) && $question['type']['value'] == 'objective') {
                    if (empty($props['value'])) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' must be specified for objective questions'];
                    }
                    $no_of_options = count(explode("\n", $question['options']['value']));
                    foreach (explode(',', $props['value']) as $ans) {
                        if ($ans <= 0 || $ans > $no_of_options) {
                            $errors[] = [$props['cell'].': '.$props['excel'].' must be within the Given options'];
                        }
                    }
                }
                if ('category' == $attr && !empty($props['value']) && !QuestionCategory::where('name', '=', $props['value'])->count()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' must be in the Question Categories list'];
                }
                $duplicates[$attr][$props['value']][] = $question;
            }
        }
        foreach ($duplicates as $attr => $values) {
            if (in_array($attr, ['question'])) {
                foreach ($values as $questions) {
                    if (count($questions) > 1) {
                        $errorMsg = [];
                        foreach ($questions as $error) {
                            $errorMsg[] = $error[$attr]['cell'];
                        }
                        $excel = $questions[0][$attr]['excel'];
                        $errors[] = implode(', ', $errorMsg).": $excel Should be unique";
                    } elseif (Question::where('question', $questions[0]['question']['value'])->exists()) {
                        $errors[] = $questions[0]['question']['cell'].': '.'Question already exists';
                    }
                }
            }
        }

        return $errors;
    }

    public function validateBulkUpdate($questions)
    {
        $errors = [];
        $duplicates = [];
        foreach ($questions as $question) {
            foreach ($question as $attr => $props) {
                if ((!isset($props['value']) || '' == $props['value'])
                    && ('expired_at' != $attr && 'options' != $attr)
                    && ('answer' != $attr)
                    && ('new_question' != $attr)) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' must not be empty'];
                }
                if ('options' == $attr && isset($question['type']['value']) && $question['type']['value'] == 'objective') {
                    if (count(explode("\n", $props['value'])) < 2) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' must specify at least two options'];
                    }
                }
                if ('answer' == $attr && isset($question['type']['value']) && $question['type']['value'] == 'objective') {
                    if (empty($props['value'])) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' must be specified for objective questions'];
                    }
                    $no_of_options = count(explode("\n", $question['options']['value']));
                    foreach (explode(',', $props['value']) as $ans) {
                        if ($ans <= 0 || $ans > $no_of_options) {
                            $errors[] = [$props['cell'].': '.$props['excel'].' must be within the Given options'];
                        }
                    }
                }
                if ('answer' == $attr && isset($question['type']['value']) && $question['type']['value'] == 'descriptive') {
                    if (empty($props['value'])) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' must be given for Descritive questions'];
                    }
                }
                if ('category' == $attr && !empty($props['value']) && !QuestionCategory::where('name', '=', $props['value'])->count()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' must be in the Question Categories list'];
                }
                $duplicates[$attr][$props['value']][] = $question;
            }
        }
        foreach ($duplicates as $attr => $values) {
            if (in_array($attr, ['new_question'])) {
                foreach ($values as $questions) {
                    $no_of_non_empty_questions = count(array_filter($questions, function ($q) {
                        return !empty($q['new_question']['value']);
                    }));
                    if ($no_of_non_empty_questions > 1) {
                        $errorMsg = [];
                        foreach ($questions as $error) {
                            $errorMsg[] = $error[$attr]['cell'];
                        }
                        $excel = $questions[0][$attr]['excel'];
                        $errors[] = implode(', ', $errorMsg).": $excel Should be unique";
                    } elseif (Question::where('question', $questions[0]['new_question']['value'])->exists()) {
                        $errors[] = $questions[0]['new_question']['cell'].': '.'Question already exists';
                    }
                }
            }
            if (in_array($attr, ['old_question'])) {
                foreach ($values as $questions) {
                    if (!Question::where('question', $questions[0]['old_question']['value'])->exists()) {
                        $errors[] = $questions[0]['old_question']['cell'].': '."Question doesn't exist";
                    }
                }
            }
        }

        return $errors;
    }

    public function deleteBulk()
    {
        return view('questions.delete-bulk');
    }

    public function destroyBulk(Request $request)
    {

        if ($request->file('file')) {
            $worksheet = IOFactory::load($request->file('file'))->getSheet(0);
            $questions = [];
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 == $row->getRowIndex()) {
                    foreach ($row->getCellIterator() as $cell) {
                        $value = $cell->getValue();
                        if ('question' == $value) {
                            $attributes[] = ['db' => 'question', 'excel' => $value];
                        }
                    }
                    //dd($value);
                    if (empty($attributes)) {
                        return redirect()->back()->withErrors(['file' => ['Template Error, please follow the format provided']]);
                    }
                }

                if ($row->getRowIndex() > 1) {
                    $index = 0;
                    $user = [];
                    foreach ($row->getCellIterator() as $cell) {
                        if ($index >= count($attributes)) {
                            continue;
                        }
                        $attr = $attributes[$index++];
                        $user[$attr['db']]['value'] = (string) $cell->getValue();
                        $user[$attr['db']]['cell'] = $cell->getCoordinate();
                        $user[$attr['db']]['excel'] = $attr['excel'];
                    }

                    array_push($questions, $user);

                }
            }
            //dd($questions);
            $ques = array();
            $res = [];
            $count = 0;
            foreach ($questions as $question) {
                //$ques[$count++] = $question['question']['value'];
                $model = Question::where('question', $question['question']['value'])
                    ->select('id')->first();
                if(!DB::table('exam_question')->where('question_id', $model->id)->exists()){
                    $model->delete();
                }

            }

            return redirect()->back()->with('success', 'Questions Deleted Successfully');
        }

        return redirect()->back()->withErrors([
          'file' => ['No ContentFile Selected'],
        ]);
    }

    public function examQuestionExport(Request $request){
        return new ExamQuestionExport($request);
    }
}
