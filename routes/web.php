<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('home');

// STUDENT
Route::controller(StudentController::class)->prefix('student')->name('student.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/delete/{id}', 'destroy')->name('destroy');
});

// COURSES
Route::controller(CourseController::class)->prefix('course')->name('course.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/delete/{id}', 'destroy')->name('destroy');
});

// ENROLLMENT
Route::controller(EnrollmentController::class)->prefix('enrollment')->name('enrollment.')->group(function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/delete/{id}', 'destroy')->name('destroy');
});
