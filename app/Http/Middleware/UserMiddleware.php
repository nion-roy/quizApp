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
      if (Auth::user()->status == 1 && Auth::user()->hasRole('user')) {
        return $next($request);
      }elseif (Auth::user()->status == 2) {
        Auth::logout();
        return redirect()->route('login')->with('warning ', 'Your account is pending.');
      } elseif (Auth::user()->status == 3) {
        Auth::logout();
        return redirect()->route('login')->with('warning ', 'Your account is suspended.');
      } elseif (Auth::user()->status == 4) {
        Auth::logout();
        return redirect()->route('login')->with('warning ', 'Your account is blocked.');
      } else {
        abort(404);
      }
    } else {
      abort(404);
    }
  }
}
