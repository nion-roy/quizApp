<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'super-admin.',  'middleware' => ['auth', 'admin']], function () {
  Route::get('dashboards', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_logout'])->name('logout');


  Route::resource('subjects', App\Http\Controllers\SuperAdmin\SubjectController::class);
  Route::resource('departments', App\Http\Controllers\SuperAdmin\DepartmentController::class);
  Route::resource('questions', App\Http\Controllers\SuperAdmin\QuestionController::class);
  Route::get('department-wise-subjects/{id}', [App\Http\Controllers\SuperAdmin\QuestionController::class, 'getSubject'])->name('department-wise-subjects');

  Route::resource('users', App\Http\Controllers\SuperAdmin\UserController::class);
  Route::resource('roles', App\Http\Controllers\SuperAdmin\RolePermissionController::class);
  Route::resource('permissions', App\Http\Controllers\SuperAdmin\PermissionController::class);

  Route::get('clear-cache', [App\Http\Controllers\SuperAdmin\ClearCacheController::class, 'clearCache'])->name('clearCache');
  
  Route::resource('exams', App\Http\Controllers\SuperAdmin\ExamController::class);
  Route::get('exam-question-search/{id}', [App\Http\Controllers\SuperAdmin\ExamController::class, 'getQuestion'])->name('question-search');
  Route::get('exam-question-pdf-download/{id}', [App\Http\Controllers\SuperAdmin\ExamController::class, 'elt_pdf_question'])->name('exam-question.download');
});
