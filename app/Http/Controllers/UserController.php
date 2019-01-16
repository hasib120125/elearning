<?php

namespace App\Http\Controllers;

use Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;
use App\Models\User;
use App\Models\PasswordHistory;
use App\Models\Role;
use App\Models\Team;
use App\Models\Group;
use App\Models\Division;
use App\Models\Department;
use App\Models\Unit;
use App\Exports\UserExport;

class UserController extends Controller
{
    public function index()
    {
        $groups = Group::pluck('name', 'id');
        $teams = Team::all();

        return view('users.index', compact('groups', 'teams'));
    }

    public function indexData(Datatables $datatables)
    {
        $request = $datatables->getRequest();
        $query = User::with('roles')
            ->with('division')
            ->with('department')
            ->with('unit')
            ->with('teams')
            ->whereNotIn('username', ['sa'])
            ->select('users.*');
        if ($request->team_ids) {
            $query->whereHas('teams', function ($query) use ($request) {
                $query->whereIn('teams.id', $request->team_ids);
            });
        } elseif ($request->group_ids) {
            $team_ids = Team::whereIn('group_id', $request->group_ids)->pluck('id');
            $query->whereHas('teams', function ($query) use ($team_ids) {
                $query->whereIn('teams.id', $team_ids);
            });
        }

        if($request->active_id !== null){
            $query->where('is_active',$request->active_id);
        }

        return $datatables->eloquent($query)
            ->addColumn('action', function ($user) {
                return view('users.actions', ['user' => $user]);
            })
            ->addColumn('division_name', function ($user) {
                return $user->division ? $user->division->name : '';
            })
            ->addColumn('department_name', function ($user) {
                return $user->department ? $user->department->name : '';
            })
            ->addColumn('unit_name', function ($user) {
                return $user->unit ? $user->unit->name : '';
            })
            ->addColumn('type', function ($user) {
                return $user->roles()->first()->display_name;
            })
            ->addColumn('teams', function ($user) {
                return $user->teams->implode('name', ', ');
            })
            ->addColumn('is_active',function($user){
                return $user->is_active;
            })
            ->addColumn('registered_at', function ($user) {
                return $user->created_at->toFormattedDateString();
            })
            ->make(true);
    }

    public function create(Request $request)
    {
        $roles = Role::where('name', '!=', 'sa')
            ->orderBy('display_name')
            ->pluck('display_name', 'id');

        $teams = Team::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');

        $divisions = Division::orderBy('name')->pluck('name', 'id');
        $departments = Department::orderBy('name')->pluck('name', 'id');
        $units = Unit::orderBy('name')->pluck('name', 'id');

        return view('users.create', [
            'roles' => $roles,
            'teams' => $teams,
            'divisions' => $divisions,
            'departments' => $departments,
            'units' => $units,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
              'name' => 'required',
              'username' => 'required|unique:users',
              'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'not_contains:robi,admin,administrator,'.$request->username,
              ],
              'confirm_password' => 'same:password',
              'role_id' => 'required',
            ],
            [
              'username.required' => 'The Login ID is required',
              'password.min' => 'Password must have at least 8 characters',
              'password.regex' => 'Password must have at least a lowercase, an uppercase, a numeric and a special character',
              'password.not_contains' => 'Password must not contain robi, admin, administrotor and your username',
              'role_id.required' => 'Please select a type',
              'team_ids.required' => 'Please select at least one team',
            ]
        );
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->source = 2;
        $user->division()->associate(Division::where('name', 'Default')->first());
        $user->department()->associate(Department::where('name', 'Default')->first());
        $user->unit()->associate(Unit::where('name', 'Default')->first());
        $user->save();

        $user->teams()->attach($request->team_ids);
        $user->assignRole($request->role_id);
        $passwordHistory = PasswordHistory::create([
            'user_id' => $user->id,
            'password' => $user->password,
        ]);

        return redirect()->back()->with('success', 'User has been created successfully');
    }

    public function createBulk()
    {
        return view('users.create-bulk');
    }

    public function storeBulk(Request $request)
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
            if ($errors = $this->validateBulkAdd($users, $attributes)) {
                return redirect()->back()->withErrors($errors);
            }

            $roles = Role::all();
            $teams = Team::all();
            $division = Division::where('name', 'Default')->first();
            $department = Department::where('name', 'Default')->first();
            $unit = Unit::where('name', 'Default')->first();
            foreach ($users as $key => $user) {
                foreach ($user as $prop => $value) {
                    $user[$prop] = $value['value'];
                }
                $role = $roles->where('display_name', '=', $user['type'])->first();
                $user_teams = $teams->whereIn('name', preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $user['teams']));
                $user['password'] = bcrypt($user['password']);
                $user['created_at'] = Carbon::now();
                $user['updated_at'] = Carbon::now();
                $user['created_by'] = auth()->user()->id;
                $user['updated_by'] = auth()->user()->id;
                $newUser = new User();
                $newUser->fill($user);
                $newUser->division()->associate($division);
                $newUser->department()->associate($department);
                $newUser->unit()->associate($unit);
                $newUser->save();
                $newUser->assignRole($role);
                $newUser->teams()->sync($user_teams);
                $passwordHistory = PasswordHistory::create([
                  'user_id' => $newUser->id,
                  'password' => $newUser->password,
                ]);
            }

            return redirect()->back()->with('success', 'Users Created Successfully');
        }

        return redirect()->back()->withErrors([
          'file' => ['No files found'],
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::where('name', '!=', 'sa')
            ->orderBy('display_name')
            ->pluck('display_name', 'id');

        $competencies = [
            'front' => 'Front Office',
            'back' => 'Bakc Office',
        ];

        $teams = Team::where('name', '!=', 'sa')
            ->orderBy('name')
            ->pluck('name', 'id');
        $divisions = Division::orderBy('name')->pluck('name', 'id');
        $departments = Department::orderBy('name')->pluck('name', 'id');
        $units = Unit::orderBy('name')->pluck('name', 'id');

        return view('users.edit', [
            'roles' => $roles,
            'teams' => $teams,
            'divisions' => $divisions,
            'departments' => $departments,
            'units' => $units,
            'user' => $user,
            'competencies' => $competencies,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (1 != $user->source) {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'username' => 'required|unique:users,username,'.$id,
                    'password' => 'nullable|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'confirm_password' => 'same:password',
                    'not_contains:robi,admin,administrator,'.$request->username,
                    'role_id' => 'required',
                ],
                [
                    'name.required' => 'The First Name is required',
                    'username.required' => 'The Login ID is required',
                    'password.min' => 'Password must have at least 8 characters',
                    'password.regex' => 'Password must have at least a lowercase, an uppercase, a numeric and a special character',
                    'password.not_contains' => 'Password must not contain robi, admin, administrotor and your username',
                    'role_id.required' => 'Please select a type',
                ]
            );
        } else {
            $this->validate(
                $request,
                [
                    'role_id' => 'required',
                ],
                [
                    'role_id.required' => 'Please select a type',
                ]
            );
        }

        $user = User::find($id);
        $user->fill($request->except('password', 'is_active', 'is_locked'));
        $user->save();

        $user->teams()->sync($request->team_ids);
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
            $passwordHistory = PasswordHistory::create([
              'user_id' => $user->id,
              'password' => $user->password,
            ]);
        }
        $user->is_active = empty($request->is_active) ? false : true;
        $user->is_locked = empty($request->is_locked) ? false : true;
        $user->save();
        $user->roles()->sync([$request->role_id]);

        return redirect()->back()->with('success', 'User updated Successfully');
    }

    public function editBulk()
    {
        return view('users.edit-bulk');
    }

    public function updateBulk(Request $request)
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
            //validate
            if ($errors = $this->validateBulkUpdate($users)) {
                return redirect()->back()->withErrors($errors);
            }

            $roles = Role::all();
            $teams = Team::all();
            foreach ($users as $key => $user) {
                $model = User::where('username', '=', $user['username']['value'])->first();
                if ($model) {
                    $role = $roles->where('display_name', '=', (string) $user['type']['value'])->first();
                    $user_teams = $teams->whereIn('name', preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $user['teams']['value']));
                    unset($user['type']);
                    unset($user['teams']);
                    foreach ($user as $prop => $value) {
                        $model->$prop = $value['value'];
                    }

                    $model->password = bcrypt($model->password);
                    $model->updated_at = Carbon::now();
                    $model->save();

                    $passwordHistory = PasswordHistory::create([
                      'user_id' => $model->id,
                      'password' => $model->password,
                    ]);
                    $model->roles()->sync($role);
                    $model->teams()->sync($user_teams);
                }
            }

            return redirect()->back()->with('success', 'Users Updated Successfully');
        }

        return redirect()->back()->withErrors([
          'file' => ['No ContentFile Selected'],
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        return view('users.delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->teams()->sync([]);
        $user->passwordHistories()->delete();
        foreach ($user->exams as $exam) {
            $exam->questions()->delete();
        }
        $user->exams()->sync([]);
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully');
    }

    public function deleteBulk()
    {
        return view('users.delete-bulk');
    }

    public function destroyBulk(Request $request)
    {
        if ($request->file('file')) {
            $worksheet = IOFactory::load($request->file('file'))->getSheet(0);
            $users = [];
            foreach ($worksheet->getRowIterator() as $row) {
                if (1 == $row->getRowIndex()) {
                    foreach ($row->getCellIterator() as $cell) {
                        $value = $cell->getValue();
                        if ('Login Id' == $value) {
                            $attributes[] = ['db' => 'username', 'excel' => $value];
                        }
                    }
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
            //validate
            if ($errors = $this->validateBulkDelete($users)) {
                return redirect()->back()->withErrors($errors);
            }

            foreach ($users as $key => $user) {
                $model = User::where('username', '=', $user['username']['value'])
                    ->where('source', '!=', 1)
                    ->first();
                if ($model) {
                    $model->delete();
                }
            }

            return redirect()->back()->with('success', 'Users Deleted Successfully');
        }

        return redirect()->back()->withErrors([
          'file' => ['No ContentFile Selected'],
        ]);
    }

    public function show($id)
    {
        if (is_numeric($id)) {
            $user = User::find($id);
        } else {
            $user = auth()->user();
            $user->is_admin = $user->hasRole('admin');
        }

        return $user->makeVisible('token');
    }

    public function showChangePasswordForm()
    {
        if (auth()->user()->hasRole('follow-admin|quiz-admin|admin')) {
            return view('users.change-password');
        }

        return view('users.change-password-user');
    }

    public function changePassword(Request $request)
    {
        $user = $request->user();
        $this->validate(
        $request,
        [
          'current_password' => [
            'required',
            function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail("Current password doesn't match with our record.");
                }
            },
          ],
          'password' => [
              'required',
              'min:8',
              'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
              'not_contains:robi,admin,administrator,'.$user->username,
              function ($attribute, $value, $fail) use ($user) {
                  $passwordHistories = $user->passwordHistories()->take(5)->get();
                  foreach ($passwordHistories as $passwordHistory) {
                      if (Hash::check($value, $passwordHistory->password)) {
                          return $fail('Your new password can not be same as any of your recent passwords. Please choose a new password.');
                      }
                  }
              },
          ],
          'confirm_password' => [
            'required',
            'same:password',
          ],
        ],
        [
          'password.min' => 'Password must have at least 8 characters',
          'password.regex' => 'Password must have at least a lowercase, an uppercase, a numeric and a special character',
          'password.not_contains' => 'Password must not contain robi, admin, administrotor and your username',
        ]
      );
        $user->update([
        'password' => bcrypt($request->password),
        'is_default_password' => false,
      ]);

        $passwordHistory = PasswordHistory::create([
        'user_id' => $user->id,
        'password' => $user->password,
      ]);

        return redirect('/');
    }

    public function validateBulkAdd($users)
    {
        $errors = [];
        $dup = [];
        foreach ($users as $user) {
            foreach ($user as $attr => $props) {
                if ((!isset($props['value']) || '' == $props['value']) && ('phone' != $attr && 'email' != $attr)) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' must not be empty'];
                }
                if ('type' == $attr && !Role::where('display_name', '=', $props['value'])->count()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' must be in one of the recognized user types'];
                }
                if ('username' == $attr && User::where('username', $props['value'])->exists()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' alredy Exists'];
                }
                if ('teams' == $attr) {
                    $teams = preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $props['value']);
                    foreach ($teams as $team) {
                        if (!Team::where('name', $team)->exists()) {
                            $errors[] = [$props['cell'].': '.$props['excel'].' = '.$team.'  must be in the Team List'];
                        }
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

    public function validateBulkUpdate($users)
    {
        $errors = [];
        $dup = [];
        foreach ($users as $user) {
            foreach ($user as $attr => $props) {
                if ((!isset($props['value']) || '' == $props['value']) && ('email' != $attr && 'phone' != $attr)) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' must not be empty'];
                }
                if ('type' == $attr && !Role::where('display_name', '=', $props['value'])->count()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' must be in one of the recognized user types'];
                }
                if ('username' == $attr && !User::where('username', $props['value'])->exists()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' Does not exist'];
                }
                if ('teams' == $attr) {
                    $teams = preg_split('/[\s*,\s*]*,+[\s*,\s*]*/', $props['value']);
                    foreach ($teams as $team) {
                        if (!Team::where('name', $team)->exists()) {
                            $errors[] = [$props['cell'].': '.$props['excel'].' = '.$team.'  must be in the Team List'];
                        }
                    }
                }
                $dup[$attr][$props['value']][] = $user;
            }
        }
        //check duplicates
        foreach ($dup as $attr => $values) {
            if ('username' == $attr) {
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
            if ('phone' == $attr) {
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

    public function validateBulkDelete($users)
    {
        $errors = [];
        $dup = [];
        foreach ($users as $user) {
            foreach ($user as $attr => $props) {
                if ('username' == $attr && !User::where('username', $props['value'])->exists()) {
                    $errors[] = [$props['cell'].': '.$props['excel'].' = '.$props['value'].' does not Exist'];
                }
                $dup[$attr][$props['value']][] = $user;
            }
        }
        //check duplicates
        foreach ($dup as $attr => $values) {
            if ('username' == $attr) {
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

    private function mapAttributes($row)
    {
        $attribute_map = [
          'Login Id' => 'username',
          'Name' => 'name',
          'Email Address' => 'email',
          'Password' => 'password',
          'Is Active' => 'is_active',
          'Type' => 'type',
          'Teams' => 'teams',
          'Phone' => 'phone',
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

    public function export(Request $request)
    {
        return new UserExport($request);
    }
}
