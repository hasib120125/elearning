<?php

namespace App\Http\Controllers;

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('roles.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Role::with('permissions')
            ->whereNotIn('roles.name', ['sa'])
            ->select('roles.*');

        return $datatables->eloquent($query)
            ->addColumn('permissions', function ($role) {
                return $role->permissions->implode('display_name', ', ');
            })
            ->addColumn('action', function ($role) {
                return view('roles.actions', ['role' => $role]);
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $permissions = Permission::orderBy('category')
            ->orderBy('display_name')
            ->pluck('display_name', 'id');

        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'display_name' => [
            'required',
            Rule::unique('roles')->where(function ($query) use ($request) {
                return $query->where('name', strtolower($request->display_name))->exists();
            }),
          ],
        ]);
        $role = Role::create([
            'display_name' => $request->display_name,
            'name' => strtolower($request->display_name),
            'guard_name' => 'admin',
        ]);
        $role->permissions()->sync($request->permissions);

        return ['success' => 'Role saved Successfully'];
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::orderBy('category')
            ->orderBy('display_name')
            ->pluck('display_name', 'id');

        return view('roles.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'display_name' => [
            'required',
            Rule::unique('roles')->where(function ($query) use ($request) {
                return $query->where('name', strtolower($request->display_name))->exists();
            })->ignore($id),
          ],
        ]);

        $role = Role::find($id);
        $role->update([
          'display_name' => $request->display_name,
          'name' => strtolower($request->display_name),
        ]);

        $role->permissions()->sync($request->permissions);

        return ['success' => 'Roles updated Successfully'];
    }

    public function delete($id)
    {
        $role = Role::find($id);

        return view('roles.delete', ['role' => $role]);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return ['success' => 'Role deleted Successfully'];
    }
}
