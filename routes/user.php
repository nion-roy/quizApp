<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.', 'middleware' => ['auth']], function () {
  Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\User\DashboardController::class, 'elt_logout'])->name('logout');



  Route::get('mcq-practice', [App\Http\Controllers\User\PracticeController::class, 'elt_index'])->name('practice.index');
  Route::post('mcq-practice/store', [App\Http\Controllers\User\PracticeController::class, 'elt_store'])->name('practice.store');
  Route::get('mcq-practice/result', [App\Http\Controllers\User\PracticeController::class, 'elt_result'])->name('practice.result');
  Route::get('mcq-practice/delete', [App\Http\Controllers\User\PracticeController::class, 'elt_delete'])->name('practice.delete');



  Route::resource('exams', App\Http\Controllers\User\ExamController::class);
});
