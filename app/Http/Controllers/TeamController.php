<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Validation\Rule;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\Team;
use App\Models\Group;
use App\Models\User;

class TeamController extends Controller
{
    public function index()
    {
        return view('teams.index');
    }

    public function indexData(Datatables $datatables)
    {
        $query = Team::with('users')
            ->with('group')
            ->where('name', '!=', 'sa')
            ->select('teams.*');

        return $datatables->eloquent($query)
            ->addColumn('group', function ($team) {
                return $team->group ? $team->group->name : '';
            })
            ->addColumn('qty', function ($team) {
                return $team->users()->count();
            })
            ->addColumn('action', function ($team) {
                return view('teams.actions', ['team' => $team]);
            })
            ->rawColumns(['name', 'action'])
            ->make(true);
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        $groups = Group::orderBy('name')->pluck('name', 'id');

        return view('teams.create', [
            'users' => $users,
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
            'group_id.required' => 'Group is required',
        ]);
        $team = new Team();
        $team->fill($request->all());
        $team->save();
        $team->users()->sync($request->users);

        return redirect()->back()->with('success', 'Team has been created successfully');
    }

    public function edit($id)
    {
        $team = Team::with('users')->find($id);
        $users = User::pluck('name', 'id');
        $groups = Group::orderBy('name')->pluck('name', 'id');

        return view('teams.edit', [
            'team' => $team,
            'users' => $users,
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
            'group_id.required' => 'Group is required',
        ]);

        $team = Team::find($id);
        $team->fill($request->all());
        $team->save();
        $team->users()->sync($request->users);

        return redirect()->back()->with('success', 'Team has been updated successfully');
    }

    public function delete($id)
    {
        $team = Team::find($id);

        return view('teams.delete', ['team' => $team]);
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        $team->users()->sync([]);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team has been deleted successfully');
    }

    public function showAttachUsersForm()
    {
        return view('teams.attach-users');
    }

    public function attachUsers(Request $request)
    {
        ini_set('max_execution_time', 300);
        if ($request->file('file')) {
            $worksheet = IOFactory::load($request->file('file'))->getSheet(0);
            $users = [];
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 == $row->getRowIndex()) {
                    $attributes = $this->mapAttributes($row);
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
                    array_push($users, $user);
                }
            }
            if ($errors = $this->validateAttachUserFile($users, $attributes)) {
                return redirect()->back()->withErrors($errors);
            }
            $teams = Team::all();
            foreach ($users as $key => $user) {
                foreach ($user as $prop => $value) {
                    $user[$prop] = $value['value'];
                }
                $user_teams = $teams->whereIn('name', preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $user['teams']));
                $curUser = User::where('username', $user['username'])->first();
                $curUser->teams()->sync($user_teams);
            }

            return redirect()->back()->with('success', 'Team Assigned Successfully');
        }

        return redirect()->back()->withErrors([
          'file' => ['No files found'],
        ]);
    }

    private function mapAttributes($row)
    {
        $attribute_map = [
          'Login Id' => 'username',
          'Teams' => 'teams',
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

        return $attributes;
    }

    private function validateAttachUserFile($users, $attributes)
    {
        $errors = [];
        $dup = [];
        foreach ($users as $user) {
            foreach ($user as $attr => $props) {
                if (!isset($props['value']) || '' == $props['value']) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' must not be empty'];
                }
                if ('teams' == $attr) {
                    $teams = preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $props['value']);
                    foreach ($teams as $team) {
                        if (!Team::where('name', $team)->exists()) {
                            $errors[] = [$props['cell'].': '.$props['excel'].' = '.$team.'  must be in the Team List'];
                        }
                    }
                }
                if ('username' == $attr) {
                    if (!User::where('username', $props['value'])->exists()) {
                        $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' doesn\'t exist'];
                    }
                }
                $dup[$attr][$props['value']][] = $user;
            }
        }
        //check duplicates
        foreach ($dup as $attr => $values) {
            if (in_array($attr, ['username'])) {
                foreach ($values as $users) {
                    if (count($users) > 1) {
                        $errorMsg = [];
                        foreach ($users as $error) {
                            $errorMsg[] = $error[$attr]['cell'];
                        }
                        $excel = $users[0][$attr]['excel'];
                        $errors[] = implode(', ', $errorMsg).": $excel Should be unique";
                    }
                }
            }
        }

        return $errors;
    }
}
