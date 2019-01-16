<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use App\Models\QuestionCategory;

class QuestionCategoryController extends Controller
{
    public function index()
    {
        return view('question-categories.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = QuestionCategory::with('parent')
            ->with('children')
            ->orderBy('name', 'ASC')
            ->select('question_categories.*')->get();
        $categories = $this->groupify($query);

        $datatable = $datatables->of($categories)
            ->addColumn('action', function ($category) {
                return view('question-categories.actions', ['category' => $category]);
            })
            ->rawColumns(['name', 'action'])
            ->make(true);

        return $datatable;
    }

    public function create()
    {
        $categories = QuestionCategory::orderBy('name')
            ->pluck('name', 'id');

        return view('question-categories.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
        ]);
        $category = QuestionCategory::create($request->all());
        if (empty($request->parent_id)) {
            $category->parent_id = 0;
            $category->save();
        }

        return redirect()->back()->with('success', 'Question Category created successfully');
    }

    public function edit($id)
    {
        $category = QuestionCategory::find($id);
        $categories = QuestionCategory::orderBy('name')
            ->where('id', '!=', $id)
            ->pluck('name', 'id');

        return view('question-categories.edit', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ], [
          'name.required' => 'The Name field is required',
        ]);

        $category = QuestionCategory::find($id);
        $category->update($request->all());
        if (empty($request->parent_id)) {
            $category->parent_id = 0;
            $category->save();
        }

        return redirect()->back()->with('success', 'Question Category updated successfully');
    }

    public function delete($id)
    {
        $category = QuestionCategory::find($id);

        return view('question-categories.delete', ['category' => $category]);
    }

    public function destroy($id)
    {
        $category = QuestionCategory::find($id);
        $category->delete();

        return redirect()->back()->with('success', 'Question Category deleted successfully');
    }

    private function groupify($input, $cat = null, $level = 0, $categories = null)
    {
        if (empty($cat)) {
            $parents = $input->whereIn('parent_id', [null, 0]);
            $categories = new Collection();
            foreach ($parents as $parent) {
                $this->groupify($input, $parent, $level, $categories);
            }

            return $categories;
        }
        $cat->name = str_repeat('-', $level).$cat->name;
        $cat->qty = $cat->questions()->count();
        $categories->push($cat);
        ++$level;
        foreach ($cat->children as $child) {
            $this->groupify($input, $child, $level, $categories);
        }
    }
}
