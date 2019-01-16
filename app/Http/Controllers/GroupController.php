<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;
use App\Models\Group;
use App\Models\User;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Group::with('teams')
            ->where('name', '!=', 'sa')
            ->select('groups.*');

        return $datatables->eloquent($query)
            ->addColumn('qty', function ($group) {
                return $group->teams()->count();
            })
            ->addColumn('action', function ($group) {
                return view('groups.actions', ['group' => $group]);
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $users = User::pluck('name', 'id');

        return view('groups.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => [
            'required',
            'unique:groups',
          ],
        ], [
        ]);
        $group = new Group();
        $group->fill($request->all());
        $group->save();

        return redirect()->back()->with('success', 'Group has been created successfully');
    }

    public function edit($id)
    {
        $group = Group::with('users')->find($id);

        return view('groups.edit', [
            'group' => $group,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('groups')->ignore($id),
            ],
        ], [
        ]);

        $group = Group::find($id);
        $group->fill($request->all());
        $group->save();

        return redirect()->back()->with('success', 'Group has been updated successfully');
    }

    public function delete($id)
    {
        $group = Group::find($id);

        return view('groups.delete', ['group' => $group]);
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->teams()->delete();
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group has been deleted successfully');
    }
}
