<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeRegistrationController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

// Employee Registration Routes
Route::get('/register/employee/{token}', [EmployeeRegistrationController::class, 'showRegistrationForm'])
    ->name('employee.register.form');
Route::post('/register/employee/{token}', [EmployeeRegistrationController::class, 'register'])
    ->name('employee.register');

// Employee Invite Route
Route::post('/employees/{employee}/invite', [EmployeeController::class, 'invite'])->name('employees.invite');
