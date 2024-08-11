<?php

use Illuminate\Support\Facades\Auth;

// Str Pad Left Function
if (!function_exists('getStrPad')) {
  function getStrPad($value)
  {
    return str_pad($value, 2, '0', STR_PAD_LEFT);
  }
}
// Str Pad Left Function


// Department wise Subject Count Function
if (!function_exists('getDepartmentCount')) {
  function getDepartmentCount($id)
  {
    $subject = App\Models\Subject::where('department_id', $id)->count();
    return $subject;
  }
}
// Department wise Subject Count Function


// Exam Attend Count Function
if (!function_exists('getExamAttendCount')) {
  function getExamAttendCount($id)
  {
    $examAttends = App\Models\ExamResult::where('exam_id', $id)->count();
    return $examAttends;
  }
}
// Exam Attend Count Function


// Subject wise Questions Count Function
if (!function_exists('getQuestionsCount')) {
  function getQuestionsCount($id)
  {
    $questions = App\Models\Question::where('subject_id', $id)->count();
    return $questions;
  }
}
// Subject wise Questions Count Function


// Percentage Calculation Function
if (!function_exists('getPercentage')) {
  function getPercentage($percentage, $total)
  {
    $percentages = ($percentage * 100) / $total;
    return $percentages;
  }
}
// Percentage Calculation Function


// Exam Exist Function
if (!function_exists('getExamExist')) {
  function getExamExist($id)
  {
    $examExist = App\Models\ExamResult::where('exam_id', $id)->where('user_id', Auth::id())->first();
    return $examExist;
  }
}
// Exam Exist Function


// All Department Function
if (!function_exists('getDepartments')) {
  function getDepartments()
  {
    $departments = App\Models\Department::where('status', true)->get();
    return $departments;
  }
}
// All Department Function



// All Branches Get Function
if (!function_exists('getBranches')) {
  function getBranches()
  {
    $branches = App\Models\Branch::where('status', true)->get();
    return $branches;
  }
}
// All Branches Get Function


// All Batch Get Function
if (!function_exists('getBatch')) {
  function getBatch()
  {
    $batch = App\Models\Batch::where('status', true)->get();
    return $batch;
  }
}
// All Batch Get Function


// User Role Function
if (!function_exists('getRoles')) {
  function getRoles()
  {
    $roles = Spatie\Permission\Models\Role::get();
    return $roles;
  }
}
// User Role Function
