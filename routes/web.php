<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\CheckDefaultPassword;

Auth::routes();


Route::get('users/change-password', 'UserController@showChangePasswordForm')
    ->name('users.change-password')->middleware('auth');

Route::post('users/change-password', 'UserController@changePassword')->middleware('auth');

Route::middleware('auth', CheckDefaultPassword::class)
    ->group(function () {
        Route::get('/', 'HomeController@index')
            ->name('home');

        //front end routes
        Route::get('{name}', 'HomeController@quiz')->where('name', '^(quiz|follow|live)[A-Za-z0-9\-\/]*');
        //templates
        Route::get('download-template/{name}', function ($file_name) {
            return response()->download(Storage::disk('template')->path($file_name));
        })->name('template-files.download');

        Route::name('users.')
            ->prefix('users')
            ->group(base_path('routes/users.php'));
        Route::name('roles.')
            ->prefix('roles')
            ->group(base_path('routes/roles.php'));
        Route::name('groups.')
            ->prefix('groups')
            ->group(base_path('routes/groups.php'));
        Route::name('teams.')
            ->prefix('teams')
            ->group(base_path('routes/teams.php'));
        Route::name('divisions.')
            ->prefix('divisions')
            ->group(base_path('routes/divisions.php'));
        Route::name('departments.')
            ->prefix('departments')
            ->group(base_path('routes/departments.php'));
        Route::name('units.')
            ->prefix('units')
            ->group(base_path('routes/units.php'));
        Route::name('question-categories.')
            ->prefix('question-categories')
            ->group(base_path('routes/question-categories.php'));
        Route::name('questions.')
            ->prefix('questions')
            ->group(base_path('routes/questions.php'));
        Route::name('exams.')
            ->prefix('exams')
            ->group(base_path('routes/exams.php'));
        Route::name('exam-user.')
            ->prefix('exam-user')
            ->group(base_path('routes/exam-user.php'));
        Route::name('settings.')
            ->prefix('settings')
            ->group(base_path('routes/settings.php'));
        Route::name('reports.')
            ->prefix('reports')
            ->group(base_path('routes/reports.php'));
        Route::name('courses.')
            ->prefix('courses')
            ->group(base_path('routes/courses.php'));
        Route::name('course-user.')
            ->prefix('course-user')
            ->group(base_path('routes/course-user.php'));
        Route::name('skills.')
            ->prefix('skills')
            ->group(base_path('routes/skills.php'));
        Route::name('content-files.')
            ->prefix('content-files')
            ->group(base_path('routes/content-files.php'));
    });
