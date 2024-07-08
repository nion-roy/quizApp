<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.', 'middleware' => ['auth']], function () {
  Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\User\DashboardController::class, 'elt_logout'])->name('logout');


  Route::resource('exams', App\Http\Controllers\User\ExamController::class);
});
