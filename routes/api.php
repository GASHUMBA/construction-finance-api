<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ExpenseController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard']);

    // Role-protected endpoints
    Route::middleware('role:admin')->group(function() {
        Route::resource('projects', ProjectController::class);
        Route::resource('employees', EmployeesController::class);
    });

    Route::middleware('role:accountant')->group(function() {
        Route::resource('expenses', ExpenseController::class);
    });

});
