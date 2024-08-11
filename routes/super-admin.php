<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
  Route::get('dashboard', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\SuperAdmin\DashboardController::class, 'elt_logout'])->name('logout');


  Route::resource('branches', App\Http\Controllers\SuperAdmin\BranchController::class);
  Route::resource('batches', App\Http\Controllers\SuperAdmin\BatchController::class);
  Route::resource('subjects', App\Http\Controllers\SuperAdmin\SubjectController::class);
  Route::resource('departments', App\Http\Controllers\SuperAdmin\DepartmentController::class);
  Route::resource('questions', App\Http\Controllers\SuperAdmin\QuestionController::class);
  Route::get('department-wise-subjects/{id}', [App\Http\Controllers\SuperAdmin\QuestionController::class, 'getSubject'])->name('department-wise-subjects');
  
  
  Route::resource('trainers', App\Http\Controllers\SuperAdmin\TrainerController::class);
  Route::resource('students', App\Http\Controllers\SuperAdmin\StudentController::class);
  Route::get('branch-to-batch/{id}', [App\Http\Controllers\SuperAdmin\StudentController::class, 'elt_branch_batch'])->name('branch-to-batch');
  
  
  
  Route::resource('attendances', App\Http\Controllers\SuperAdmin\AttendanceController::class);
  Route::resource('users', App\Http\Controllers\SuperAdmin\UserController::class);
  Route::resource('roles', App\Http\Controllers\SuperAdmin\RolePermissionController::class);
  Route::resource('permissions', App\Http\Controllers\SuperAdmin\PermissionController::class);
  Route::resource('labs', App\Http\Controllers\SuperAdmin\LabController::class);
  Route::resource('routines', App\Http\Controllers\SuperAdmin\RoutineController::class);

  Route::resource('exams', App\Http\Controllers\SuperAdmin\ExamController::class);
  Route::get('exam-question-search/{id}', [App\Http\Controllers\SuperAdmin\ExamController::class, 'getQuestion'])->name('question-search');
  Route::get('exam-question-pdf-download/{id}', [App\Http\Controllers\SuperAdmin\ExamController::class, 'elt_pdf_question'])->name('exam-question.download');
  Route::get('exam-results/{id}', [App\Http\Controllers\SuperAdmin\ExamController::class, 'elt_exam_results'])->name('exams.result');
});
