<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
    Route::prefix('courses')->group(function () {
        Route::get('/', 'CourseController@index');
        Route::post('self-assign/{course_id}', 'CourseController@selfAssign');
        Route::get('/{id}', 'CourseController@show');
    });
    Route::prefix('course-user')->group(function () {
        Route::get('/', 'CourseUserController@index');
        Route::patch('/{id}', 'CourseUserController@update');
        Route::patch('update/{id}', 'CourseUserController@updateAPI');
        Route::patch('by-course-id/{course_id}', 'CourseUserController@updateByCourseId');
    });
    Route::prefix('contents')->group(function () {
        Route::get('/', 'ContentController@index');
        Route::get('/{id}', 'ContentController@show');
    });
    Route::prefix('content-user')->group(function () {
        Route::get('/by-course/{course_id}', 'ContentUserController@byCourse');
        Route::patch('/toggle-status/{content_id}', 'ContentUserController@toggleStatus');
    });
    Route::prefix('exams')->group(function () {
        Route::get('/pending-and-completed', 'ExamController@pendingAndCompleted');
    });
    Route::prefix('exam-user')->group(function () {
        Route::post('/submit/{exam_user_id}', 'ExamUserController@submit');
    });
    Route::prefix('skills')->group(function () {
        Route::get('/', 'SkillController@index');
    });
    Route::prefix('topics')->group(function () {
        Route::get('/', 'TopicController@index');
        Route::get('/{id}', 'TopicController@show');
    });
    Route::prefix('users')->group(function () {
        Route::get('/self', 'UserController@self');
        Route::get('/self-detail', 'UserController@selfDetail');
    });
    
    Route::get('/liveclass-status-data', 'LiveclassController@statusData');
});
