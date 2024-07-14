<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.', 'middleware' => ['auth']], function () {
  Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\User\DashboardController::class, 'elt_logout'])->name('logout');



  Route::get('mcq-practice', [App\Http\Controllers\User\PracticeController::class, 'elt_index'])->name('practice.index');
  Route::post('mcq-practice/store', [App\Http\Controllers\User\PracticeController::class, 'elt_store'])->name('practice.store');
  Route::get('mcq-practice/success', [App\Http\Controllers\User\PracticeController::class, 'elt_success'])->name('practice.success');
  Route::get('mcq-practice/results', [App\Http\Controllers\User\PracticeController::class, 'elt_result'])->name('practice.result');
  Route::get('mcq-practice/results/{id}', [App\Http\Controllers\User\PracticeController::class, 'elt_result_show'])->name('practice.result.show');
  Route::get('mcq-practice/delete/{id}', [App\Http\Controllers\User\PracticeController::class, 'elt_destroy'])->name('practice.destory');



  Route::resource('exams', App\Http\Controllers\User\ExamController::class);
});
