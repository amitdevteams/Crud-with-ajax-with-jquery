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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index','StudentController@index')->name('index');
Route::post('home','StudentController@store')->name('home');
Route::get('student-data','StudentController@show')->name('student-data');
Route::get('edit-student/{id}','StudentController@edit');
Route::get('show-student/{id}','StudentController@showdata');
Route::post('update-student/{id}','StudentController@update');
Route::delete('delete-student/{id}','StudentController@destroy');




Route::get('index2','TeacherController@index')->name('index2');
// Route::post('home2','TeacherController@store')->name('home2');
// Route::get('teacher-data','TeacherController@show')->name('teacher-data');
// Route::get('edit-teacher/{id}','TeacherController@edit');
// Route::post('update-teacher/{id}','TeacherController@update');
// Route::delete('delete-teacher/{id}','TeacherController@destroy');
// Route::get('show-teacher/{id}','TeacherController@showdata');