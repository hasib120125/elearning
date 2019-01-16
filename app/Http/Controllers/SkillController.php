<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        return view('skills.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Skill::where('name', '!=', 'sa')
            ->select('skills.*');

        return $datatables->eloquent($query)
            ->addColumn('qty', function ($skill) {
                return $skill->courses()->count();
            })
            ->addColumn('action', function ($skill) {
                return view('skills.actions', ['skill' => $skill]);
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => [
            'required',
            'unique:skills',
          ],
        ], [
        ]);
        $skill = new Skill();
        $skill->fill($request->all());
        $skill->save();

        return redirect()->back()->with('success', 'Skill has been created successfully');
    }

    public function edit($id)
    {
        $skill = Skill::find($id);

        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('skills')->ignore($id),
            ],
        ], [
        ]);

        $skill = Skill::find($id);
        $skill->fill($request->all());
        $skill->save();

        return redirect()->back()->with('success', 'Skill has been updated successfully');
    }

    public function delete($id)
    {
        $skill = Skill::find($id);

        return view('skills.delete', ['skill' => $skill]);
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill has been deleted successfully');
    }
}
