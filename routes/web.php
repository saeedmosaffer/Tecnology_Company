<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for professor
// Route::get('/professor', [App\Http\Controllers\ProfessorController::class, 'index'])->name('professor');
// Route::put('/professor/update', [App\Http\Controllers\ProfessorController::class, 'update'])->name('professor.update');

// Routes for professor
Route::get('/professors', 'App\Http\Controllers\ProfessorController@index' )->name('professors');
Route::get('/professors/trashed', 'App\Http\Controllers\ProfessorController@professorsTrashed' )->name('professors.trashed');
Route::get('/professor/create', 'App\Http\Controllers\ProfessorController@create' )->name('professor.create');
Route::post('/professor/store', 'App\Http\Controllers\ProfessorController@store' )->name('professor.store');
Route::get('/professor/show/{slug}', 'App\Http\Controllers\ProfessorController@show' )->name('professor.show');
Route::get('/professor/edit/{id}', 'App\Http\Controllers\ProfessorController@edit' )->name('professor.edit');
Route::post('/professor/update/{id}', 'App\Http\Controllers\ProfessorController@update' )->name('professor.update');
Route::get('/professor/destroy/{id}', 'App\Http\Controllers\ProfessorController@destroy' )->name('professor.destroy');
Route::get('/professor/hdelete/{id}', 'App\Http\Controllers\ProfessorController@hdelete' )->name('professor.hdelete');
Route::get('/professor/restore/{id}', 'App\Http\Controllers\ProfessorController@restore' )->name('professor.restore');

// Routes for student
Route::get('/students', 'App\Http\Controllers\StudentController@index' )->name('students');
Route::get('/students/trashed', 'App\Http\Controllers\StudentController@studentsTrashed' )->name('students.trashed');
Route::get('/student/create', 'App\Http\Controllers\StudentController@create' )->name('student.create');
Route::post('/student/store', 'App\Http\Controllers\StudentController@store' )->name('student.store');
Route::get('/student/show/{id}', 'App\Http\Controllers\StudentController@show' )->name('student.show');
Route::get('/student/edit/{id}', 'App\Http\Controllers\StudentController@edit' )->name('student.edit');
Route::post('/student/update/{id}', 'App\Http\Controllers\StudentController@update' )->name('student.update');
Route::get('/student/destroy/{id}', 'App\Http\Controllers\StudentController@destroy' )->name('student.destroy');
Route::get('/student/hdelete/{id}', 'App\Http\Controllers\StudentController@hdelete' )->name('student.hdelete');
Route::get('/student/restore/{id}', 'App\Http\Controllers\StudentController@restore' )->name('student.restore');
Route::get('/student/buyBook', 'App\Http\Controllers\StudentController@buyBook' )->name('student.buyBook');

// Routes for course
Route::get('/courses', 'App\Http\Controllers\CourseController@index' )->name('courses');
Route::get('/courses/trashed', 'App\Http\Controllers\CourseController@coursesTrashed' )->name('courses.trashed');
Route::get('/course/create', 'App\Http\Controllers\CourseController@create' )->name('course.create');
Route::post('/course/store', 'App\Http\Controllers\CourseController@store' )->name('course.store');
Route::get('/course/show/{slug}', 'App\Http\Controllers\CourseController@show' )->name('course.show');
Route::get('/course/edit/{id}', 'App\Http\Controllers\CourseController@edit' )->name('course.edit');
Route::post('/course/update/{id}', 'App\Http\Controllers\CourseController@update' )->name('course.update');
Route::get('/course/destroy/{id}', 'App\Http\Controllers\CourseController@destroy' )->name('course.destroy');
Route::get('/course/hdelete/{id}', 'App\Http\Controllers\CourseController@hdelete' )->name('course.hdelete');
Route::get('/course/restore/{id}', 'App\Http\Controllers\CourseController@restore' )->name('course.restore');

// Routes for library
Route::get('/books', 'App\Http\Controllers\LibraryController@index' )->name('books');
Route::get('/books/trashed', 'App\Http\Controllers\LibraryController@booksTrashed' )->name('books.trashed');
Route::get('/book/create', 'App\Http\Controllers\LibraryController@create' )->name('book.create');
Route::post('/book/store', 'App\Http\Controllers\LibraryController@store' )->name('book.store');
Route::get('/book/show/{slug}', 'App\Http\Controllers\LibraryController@show' )->name('book.show');
Route::get('/book/edit/{id}', 'App\Http\Controllers\LibraryController@edit' )->name('book.edit');
Route::post('/book/update/{id}', 'App\Http\Controllers\LibraryController@update' )->name('book.update');
Route::get('/book/destroy/{id}', 'App\Http\Controllers\LibraryController@destroy' )->name('book.destroy');
Route::get('/book/hdelete/{id}', 'App\Http\Controllers\LibraryController@hdelete' )->name('book.hdelete');
Route::get('/book/restore/{id}', 'App\Http\Controllers\LibraryController@restore' )->name('book.restore');
