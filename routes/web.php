<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillHubController;

Route::get('/', [SkillHubController::class, 'index'])->name('home');
Route::post('/student', [SkillHubController::class, 'storeStudent'])->name('store.student');
Route::get('/student/edit/{id}', [SkillHubController::class, 'editStudent'])->name('edit.student');
Route::post('/student/update/{id}', [SkillHubController::class, 'updateStudent'])->name('update.student');
Route::get('/student/show/{id}', [SkillHubController::class, 'showStudent'])->name('show.student');
Route::post('/course', [SkillHubController::class, 'storeCourse'])->name('store.course');
Route::get('/course/edit/{id}', [SkillHubController::class, 'editCourse'])->name('edit.course');
Route::post('/course/update/{id}', [SkillHubController::class, 'updateCourse'])->name('update.course');
Route::get('/course/show/{id}', [SkillHubController::class, 'showCourse'])->name('show.course');
Route::post('/enroll', [SkillHubController::class, 'enroll'])->name('enroll');
Route::get('/delete/{type}/{id}', [SkillHubController::class, 'destroy'])->name('delete');
