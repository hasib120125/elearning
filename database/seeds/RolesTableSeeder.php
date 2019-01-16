<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'instructor',
                'display_name' => 'Instructor',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'guardian',
                'display_name' => 'Guardian',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'student',
                'display_name' => 'Student',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'quiz-admin',
                'display_name' => 'Quiz Admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'follow-admin',
                'display_name' => 'Follow Admin',
                'guard_name' => 'admin',
            ],
        ];
        foreach ($roles as $key => $value) {
            $role = new Role();
            $role->fill($value);
            $role->save();
        }
    }
}
