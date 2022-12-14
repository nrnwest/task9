<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StudentController;
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


Route::get('/test', \App\Http\Controllers\TestController::class)->name('test');

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/groups/', [GroupController::class, 'index'])->name('groups.index');

Route::get('/courses/', [CourseController::class, 'index'])->name('courses.index');

Route::resources([
    'students' => StudentController::class,
]);
