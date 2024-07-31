<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.', 'middleware' => 'user'], function () {
  Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\User\DashboardController::class, 'elt_logout'])->name('logout');


  //MCQ Practice Controllers
  Route::get('mcq-practice', [App\Http\Controllers\User\PracticeController::class, 'elt_index'])->name('practice.index');
  Route::post('mcq-practice/store', [App\Http\Controllers\User\PracticeController::class, 'elt_store'])->name('practice.store');
  Route::get('mcq-practice/success', [App\Http\Controllers\User\PracticeController::class, 'elt_success'])->name('practice.success');
  Route::get('mcq-practice/results', [App\Http\Controllers\User\PracticeController::class, 'elt_result'])->name('practice.result');
  Route::get('mcq-practice/results/{id}', [App\Http\Controllers\User\PracticeController::class, 'elt_result_show'])->name('practice.result.show');
  Route::get('mcq-practice/delete/{id}', [App\Http\Controllers\User\PracticeController::class, 'elt_destroy'])->name('practice.destory');
  //MCQ Practice Controllers



  //Exam Controllers
  Route::get('exams', [App\Http\Controllers\User\ExamController::class, 'index'])->name('exams.index');
  Route::get('exam-expired', [App\Http\Controllers\User\ExamController::class, 'elt_expired'])->name('exams.expired');
  Route::get('exam-question/{slug}', [App\Http\Controllers\User\ExamController::class, 'elt_exam'])->name('exams.create');
  Route::post('exam-question-store', [App\Http\Controllers\User\ExamController::class, 'elt_store'])->name('exams.store');
  Route::get('exam-result/{id}', [App\Http\Controllers\User\ExamController::class, 'elt_result'])->name('exams.result');
  //Exam Controllers


  Route::get('teacher-review', [App\Http\Controllers\User\TeacherReviewController::class, 'index'])->name('teachers.review.index');
});
