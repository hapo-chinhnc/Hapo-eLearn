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
Route::post('/user-course/{id}', 'User\UserCourseController@store')->name('users_course.store');
Route::get('/user-course/{id}', 'User\UserCourseController@destroy')->name('users_course.destroy');
Auth::routes();
Route::get('/lesson-detail/{id}', 'LessonsController@show')->name('lesson.detail')->middleware('auth');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::resource('/user-management', 'Admin\UserManagementController');
});
Route::post('/lesson-user/{id}', 'User\LessonUserController@store')->name('lesson_users.store');
Route::post('/review', 'User\ReviewController@store')->name('review.store');
Route::get('/review/{id}', 'User\ReviewController@destroy')->name('review.destroy');
Route::post('/lesson-review', 'User\LessonReviewController@store')->name('lesson_review.store');
Route::get('/profile/{id}', 'User\ProfileController@show')->name('profile.show');
Route::post('/update-profile/{id}', 'User\ProfileController@update')->name('profile.update');
Route::post('/update-avatar/{id}', 'User\ProfileController@uploadAvatar')->name('profile.avatar');
Route::get('/course-search', 'CoursesController@search')->name('course.search');
Route::get('/lesson-search/{id}', 'CoursesController@searchLessons')->name('lessons.search');
Route::post('/update-review/{id}', 'User\ReviewController@update')->name('review.update');
