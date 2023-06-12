<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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
    return view('home', [
        'cewe' => ['Jessie Eden'],
    ]);
})->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/students', [StudentController::class, 'index'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware('auth');
Route::get('/students-add', [StudentController::class, 'create'])->middleware('auth');
Route::post('/student', [StudentController::class, 'store'])->middleware('auth');
Route::get('/students-edit/{id}', [StudentController::class, 'edit'])->middleware('auth');
Route::put('/student/{id}', [StudentController::class, 'update'])->middleware('auth');
Route::get('/students-delete/{id}', [StudentController::class, 'delete'])->middleware('auth');
Route::delete('/students-destroy/{id}', [StudentController::class, 'destroy'])->middleware('auth');
Route::get('/students-deleted', [StudentController::class, 'deleted'])->middleware('auth');
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware('auth');

Route::get('/class', [ClassController::class, 'index'])->middleware('auth');
Route::get('/classd/{id}', [ClassController::class, 'show'])->middleware('auth');

Route::get('/ekskul', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/ekskuld/{id}', [ExtracurricularController::class, 'show'])->middleware('auth');

Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacherd/{id}', [TeacherController::class, 'show'])->middleware('auth');
// Route::get('/student-mass-update', [StudentController::class, 'massUpdate']);
