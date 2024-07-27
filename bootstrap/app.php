<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UpdateLastActivity;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )

  ->withMiddleware(function (Middleware $middleware) {
    
    $middleware->web(append: [
      UpdateLastActivity::class,
    ]);

    $middleware->alias([
      'admin' => AdminMiddleware::class,
      'user' => UserMiddleware::class,
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
