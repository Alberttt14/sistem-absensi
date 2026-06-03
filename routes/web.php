<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DivisionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::post('/checkin', [AttendanceController::class, 'checkIn'])
        ->name('checkin');

    Route::post('/checkout', [AttendanceController::class, 'checkOut'])
        ->name('checkout');

    Route::get('/attendance/history', [AttendanceController::class, 'history'])
        ->name('attendance.history');

    Route::get('/attendance/export-excel', [AttendanceController::class, 'exportExcel'])
        ->name('attendance.export');

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('employees', EmployeeController::class);

    Route::resource('divisions', DivisionController::class);

});

require __DIR__.'/auth.php';