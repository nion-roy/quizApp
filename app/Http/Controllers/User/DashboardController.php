<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
  public function elt_index()
  {
    return view("user.dashboard");
  }


  public function elt_logout(): RedirectResponse
  {
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success', 'Your account logout successfull.');
  }
}
