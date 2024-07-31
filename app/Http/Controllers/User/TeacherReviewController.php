<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherReviewController extends Controller
{
  public function index()
  {
    return view('user.teacher-review.index');
  }
}
