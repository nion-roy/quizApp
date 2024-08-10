<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Lab;
use App\Models\Exam;
use App\Models\User;
use App\Models\Branch;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Models\Batch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
  public function elt_index()
  {
    $department = Department::count();
    $branch = Branch::count();
    $batch = Batch::count();
    $lab = Lab::count();
    $subject = Subject::count();
    $question = Question::count();
    $examQuestion = Exam::count();

    // Count teachers by filtering users with the 'teacher' role
    $teacher = User::whereHas('roles', function ($query) {
      $query->where('name', 'teacher');
    })->count();

    // Count all students
    $student = User::whereHas('roles', function ($query) {
      $query->where('name', 'user');
    })->count();

    return view("super-admin.dashboard", compact("branch", "batch","lab", "department", "subject", "question", "examQuestion", "teacher", "student"));
  }



  public function elt_logout(): RedirectResponse
  {
    Auth::guard('web')->logout();
    return redirect()->route('login')->with('success', 'Your account logout successfull.');
  }
}
