<?php

namespace App\Http\Controllers\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Question;
use App\Models\Subject;

class ExamController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('super-admin.exam.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $departments = Department::where('status', true)->get();
    $subjects = Subject::where('status', true)->get();
    return view('super-admin.exam.create', compact('departments', 'subjects'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }

  public function getQuestion($id)
  {

    // return $id;

    $questions = Question::where('status', true)->where('subject_id', $id)->latest('id')->get();
    return $questions;
  }
}
