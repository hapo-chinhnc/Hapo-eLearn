<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses', 'CoursesController@index')->name('courses.index');
Route::get('/course/{id}', 'CoursesController@show')->name('courses.show');
Route::get('/user-course', 'User\UserCourseController@store')->name('userCourse.store');
Route::get('/user-course/{id}', 'User\UserCourseController@destroy')->name('userCourse.destroy');
Auth::routes();
Route::get('/lesson-detail/{id}', 'LessonsController@show')->name('lesson.detail')->middleware('auth');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('/user-management', 'Admin\UserManagementController');
});
Route::get('/lesson-user', 'User\LessonUserController@store')->name('lessonUser.store');
