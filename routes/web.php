<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});


Route::get('clear-cache', [App\Http\Controllers\SuperAdmin\ClearCacheController::class, 'clearCache'])->name('clearCache');

require __DIR__ . '/auth.php';
require __DIR__ . '/super-admin.php';
require __DIR__ . '/user.php';
