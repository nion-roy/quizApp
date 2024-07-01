<?php

use Illuminate\Support\Facades\Route;



Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['admin']], function () {
  Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'elt_index'])->name('dashboard');
  Route::get('logout', [App\Http\Controllers\Admin\DashboardController::class, 'elt_logout'])->name('logout');
});
