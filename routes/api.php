<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeePositionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectEmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:admin-api')->get('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:admin-api')->get('/user', [AuthController::class, 'user']);
});

Route::middleware(['auth:admin-api'])->group(function () {
    Route::resource('/employees', EmployeeController::class);

    Route::resource('/employee-positions', EmployeePositionController::class);

    Route::resource('/roles', RoleController::class);

    Route::resource('/user-roles', UserRoleController::class);

    Route::get('/leaves/summary/{year}', [LeaveController::class, 'summary']);
    Route::get('/leaves/calendar', [LeaveController::class, 'calendar']);
    Route::post('/leaves/import', [LeaveController::class, 'import']);
    Route::resource('/leaves', LeaveController::class);

    Route::get('/projects/summary', [ProjectController::class, 'summary']);
    Route::resource('/projects', ProjectController::class);

    Route::resource('/project-employees', ProjectEmployeeController::class);
});

Route::prefix('/payment')->group(function () {
    Route::post('/snap', [PaymentController::class, 'snap']);
    Route::post('/core', [PaymentController::class, 'core']);
    Route::post('/notif', [PaymentController::class, 'notif']);
});