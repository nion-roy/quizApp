<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['user']], function () {
  Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\User\DashboardController::class, 'elt_logout'])->name('logout');
});
