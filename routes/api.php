<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeePositionController;
use App\Http\Controllers\LeaveController;
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
    Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('/employees', EmployeeController::class);
    Route::resource('/employee-positions', EmployeePositionController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/user-roles', UserRoleController::class);
    Route::resource('/leaves', LeaveController::class, ['parameters' => ['leaves' => 'leave']]);
});