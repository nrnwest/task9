<?php

use App\Http\Controllers\Api\V1\CourseApiController;
use App\Http\Controllers\Api\V1\GroupApiController;
use App\Http\Controllers\Api\V1\StudentApiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/v1/groups/', [GroupApiController::class, 'index']);
Route::get('/v1/courses/', [CourseApiController::class, 'index']);

Route::apiResource('/v1/students', StudentApiController::class)->only([
    'index', 'show'
]);
