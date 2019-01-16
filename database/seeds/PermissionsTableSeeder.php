<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permission = [
            //  [
            //     'name' => 'user-list',
            //     'display_name' => 'List Users',
            //     'category' => 'user',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'user-create',
            //     'display_name' => 'Create Users',
            //     'category' => 'user',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'user-edit',
            //     'display_name' => 'Edit Users',
            //     'category' => 'user',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'user-delete',
            //     'display_name' => 'Delete Users',
            //     'category' => 'user',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'role-list',
            //     'display_name' => 'List roles',
            //     'category' => 'role',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'role-create',
            //     'display_name' => 'Create roles',
            //     'category' => 'role',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'role-edit',
            //     'display_name' => 'Edit roles',
            //     'category' => 'role',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'role-delete',
            //     'display_name' => 'Delete roles',
            //     'category' => 'role',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-category-list',
            //     'display_name' => 'List Question Categories',
            //     'category' => 'question-category',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-category-create',
            //     'display_name' => 'Create Question Category',
            //     'category' => 'question-category',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-category-edit',
            //     'display_name' => 'Edit Question Category',
            //     'category' => 'question-category',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-category-delete',
            //     'display_name' => 'Delete Question Category',
            //     'category' => 'question-category',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-list',
            //     'display_name' => 'List Questions',
            //     'category' => 'question',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-create',
            //     'display_name' => 'Create Question',
            //     'category' => 'question',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-edit',
            //     'display_name' => 'Edit Question',
            //     'category' => 'question',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'question-delete',
            //     'display_name' => 'Delete Question',
            //     'category' => 'question',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'exam-list',
            //     'display_name' => 'List Exams',
            //     'category' => 'exam',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'exam-create',
            //     'display_name' => 'Create Exam',
            //     'category' => 'exam',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'exam-edit',
            //     'display_name' => 'Edit Exam',
            //     'category' => 'exam',
            //     'guard_name' => 'admin',
            // ],
            // [
            //     'name' => 'exam-delete',
            //     'display_name' => 'Delete Exam',
            //     'category' => 'exam',
            //     'guard_name' => 'admin',
            // ],
            [
                'name' => 'group-list',
                'display_name' => 'List Groups',
                'category' => 'group',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'group-create',
                'display_name' => 'Create Group',
                'category' => 'group',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'group-edit',
                'display_name' => 'Edit Group',
                'category' => 'group',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'group-delete',
                'display_name' => 'Delete Group',
                'category' => 'group',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'team-list',
                'display_name' => 'List Teams',
                'category' => 'team',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'team-create',
                'display_name' => 'Create Team',
                'category' => 'team',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'team-edit',
                'display_name' => 'Edit Team',
                'category' => 'team',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'team-delete',
                'display_name' => 'Delete Team',
                'category' => 'team',
                'guard_name' => 'admin',
            ],
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
