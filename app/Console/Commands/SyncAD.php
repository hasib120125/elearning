<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Division;
use App\Models\Department;
use App\Models\Unit;
use App\Models\User;

class SyncAD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:ad {file_path}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync the users table with Active Directory';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //$file = fopen($this->argument('file_path'), 'r');
        $divisions = [];
        $departments = [];
        $units = [];
        $users = [];
        $lines = file($this->argument('file_path'));
        //$headings = fgetcsv($file);
        $headings = $lines[0];
        //while (!feof($file)) {
        foreach ($lines as $key => $line) {
            //$columns = fgetcsv($file);
            if (0 == $key) {
                continue;
            }
            $row = explode('|', $line);

            //if (is_array($columns) && 8 == count($columns)) {
            if (true) {
                // $row = [];
                // foreach ($columns as $column) {
                //     if (!empty($column)) {
                //         $row[] = $column;
                //     }
                // }
                // $row = implode($row, ',');
                // $rowRaw = $row;
                // $row = explode('|', $row);
                if (count($row) > 9) {
                    if (!in_array($row[4], array_pluck($units, 'name')) && !empty($row[4])) {
                        $unit['name'] = $row[4];
                        $unit['division'] = $row[2];
                        $unit['department'] = $row[3];
                        $units[] = $unit;
                    }
                    if (!in_array($row[3], array_pluck($departments, 'name')) && !empty($row[3])) {
                        $department['name'] = $row[3];
                        $department['division'] = $row[2];
                        $departments[] = $department;
                    }
                    if (!in_array($row[2], array_pluck($divisions, 'name')) && !empty($row[2])) {
                        $division['name'] = $row[2];
                        $divisions[] = $division;
                    }
                    if (!in_array($row[0], array_pluck($users, 'username'))) {
                        $user['name'] = $row[1];
                        $user['code'] = $row[0];
                        $user['phone'] = $row[8];
                        $user['email'] = strtolower($row[9]);
                        $user['username'] = explode('@', $user['email'])[0];
                        if (!$user['email']) {
                            $this->info($row[0]);
                        }
                        $user['division'] = $row[2];
                        $user['department'] = $row[3];
                        $user['designation'] = $row[7];
                        $user['unit'] = $row[4];
                        $user['is_default_password'] = 1;
                        if ($user['username']) {
                            $users[] = $user;
                        }
                    }
                }
            }
        }
        //fclose($file);
        $old_divisions = Division::all();
        foreach ($divisions as $division) {
            $old_division = $old_divisions->where('name', $division['name'])->first();
            if (empty($old_division)) {
                Division::create(['name' => $division['name']]);
            }
        }

        $old_departments = Department::all();
        $updated_divisions = Division::all();
        foreach ($departments as $department) {
            $old_department = $old_departments->where('name', $department['name'])->first();
            if (empty($old_department)) {
                $old_department = new Department();
                $old_department->name = $department['name'];
            }
            $old_department->division()->associate($updated_divisions->where('name', $department['division'])->first());
            $old_department->save();
        }
        $old_units = Unit::all();
        $updated_departments = Department::all();
        foreach ($units as $unit) {
            $old_unit = $old_units->where('name', $unit['name'])->first();
            if (empty($old_unit)) {
                $old_unit = new Unit();
                $old_unit->name = $unit['name'];
            }
            $old_unit->division()->associate($updated_divisions->where('name', $unit['division'])->first());
            $old_unit->department()->associate($updated_departments->where('name', $unit['department'])->first());
            $old_unit->save();
        }
        $updated_units = Unit::all();
        $old_users = User::all();
        foreach ($users as $user) {
            if (empty($user['username'])) {
                continue;
            }
            $old_user = $old_users->where('username', $user['username'])->first();
            if (empty($old_user)) {
                $old_user = new User();
            }
            $old_user->username = $user['username'];
            $old_user->code = $user['code'];
            $old_user->password = bcrypt('Jana@123');
            $old_user->is_default_password = true;
            $old_user->is_active = true;
            $old_user->is_locked = false;
            $old_user->source = 1;
            $old_user->name = $user['name'];
            $old_user->phone = $user['phone'];
            $old_user->email = $user['email'];
            $old_user->designation = $user['designation'];
            $old_user->division()->associate($updated_divisions->where('name', $user['division'])->first());
            $old_user->department()->associate($updated_departments->where('name', $user['department'])->first());
            $old_user->unit()->associate($updated_units->where('name', $user['unit'])->first());
            $old_user->save();
            if ($old_user->roles()->count() <= 0) {
                $old_user->assignRole('student');
            }
        }
        $updated_divisions = Division::all();
        $updated_departments = Department::all();
        $updated_units = Unit::all();
        $updated_users = User::where('source', 1)->get();
        foreach ($updated_users as $updated_user) {
            if (!in_array($updated_user->name, array_pluck($users, 'name'))) {
                $updated_user->teams()->sync([]);
                $updated_user->passwordHistories()->delete();
                foreach ($updated_user->exams as $exam) {
                    $exam->questions()->delete();
                }
                $updated_user->exams()->sync([]);
                $updated_user->delete();
            }
        }
        foreach ($updated_units as $updated_unit) {
            if (!in_array($updated_unit->name, array_pluck($units, 'name'))) {
                $updated_unit->delete();
            }
        }
        foreach ($updated_departments as $updated_department) {
            if (!in_array($updated_department->name, array_pluck($departments, 'name'))) {
                $updated_department->delete();
            }
        }
        foreach ($updated_divisions as $updated_division) {
            if (!in_array($updated_division->name, array_pluck($divisions, 'name'))) {
                $updated_division->delete();
            }
        }
    }
}
