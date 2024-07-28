<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
  public function elt_index()
  {
    return view("super-admin.dashboard");
  }


  public function elt_logout(): RedirectResponse
  {
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success', 'Your account logout successfull.');
  }
}
