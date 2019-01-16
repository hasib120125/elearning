<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        return view('divisions.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Division::with('users')
            ->select('divisions.*');

        return $datatables->eloquent($query)
            ->addColumn('qty', function ($division) {
                return $division->users()->count();
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $groups = Group::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('teams.create', [
            'groups' => $groups,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => [
            'required',
            'unique:teams',
          ],
          'group_id' => 'required',
      ], [
          'group_id.required' => 'Group is Required',
      ]);
        $team = new Team();
        $team->fill($request->all());
        $team->group()->associate($request->group_id);
        $team->save();

        return ['success' => 'Team created Successfully'];
    }

    public function edit($id)
    {
        $team = Team::find($id);
        $groups = Group::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');

        return view('teams.edit', [
            'team' => $team,
            'groups' => $groups,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('teams')->ignore($id),
            ],
            'group_id' => 'required',
        ], [
            'group_id.required' => 'Group is Required',
        ]);

        $team = Team::find($id);
        $team->fill($request->all());

        $team->group()->associate($request->group_id);
        $team->save();

        return ['success' => 'Team updated Successfully'];
    }

    public function delete($id)
    {
        $team = Team::find($id);

        return view('teams.delete', ['team' => $team]);
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();

        return ['success' => 'Team deleted Successfully'];
    }
}
