<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'super-admin.', 'prefix' => 'super-admin', 'middleware' => ['super-admin']], function () {
  Route::get('dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_logout'])->name('logout');


  Route::resource('subjects', App\Http\Controllers\SuperAdmin\SubjectController::class);
  Route::resource('departments', App\Http\Controllers\SuperAdmin\DepartmentController::class);
  Route::resource('questions', App\Http\Controllers\SuperAdmin\QuestionController::class);
  Route::get('department-wise-subjects/{id}', [App\Http\Controllers\SuperAdmin\QuestionController::class, 'getSubject'])->name('department-wise-subjects');
  
  Route::resource('exams', App\Http\Controllers\SuperAdmin\ExamController::class);
  Route::post('mcq-exams', [App\Http\Controllers\SuperAdmin\ExamController::class, 'questionSearch'])->name('questionSearch');

  Route::resource('users', App\Http\Controllers\SuperAdmin\UserController::class);


  Route::get('clear-cache', [App\Http\Controllers\SuperAdmin\ClearCacheController::class, 'clearCache'])->name('clearCache');
});
