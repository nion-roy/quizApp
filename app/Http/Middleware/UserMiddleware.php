<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (Auth::check()) {
      $user = Auth::user();

      if ($user->status == 1 && $user->hasRole('user')) {
        return $next($request);
      }

      // Handle different statuses
      switch ($user->status) {
        case 2:
          Auth::logout();
          return redirect()->route('login')->with('warning', 'Your account is pending.');
        case 3:
          Auth::logout();
          return redirect()->route('login')->with('warning', 'Your account is suspended.');
        case 4:
          Auth::logout();
          return redirect()->route('login')->with('warning', 'Your account is blocked.');
        default:
          abort(404);
      }
    } else {
      abort(404);
    }
  }
}
