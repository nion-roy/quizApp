<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\QuestionOption;

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
    //
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


  public function questionSearch(Request $request)
  {
    $questions = Question::where('department_id', $request->department_id)->where('subject_id', $request->subject_id)->where('status', true)->inRandomOrder()->take($request->value)->get();
    // return $questions;
    return view('super-admin.exam.create', compact('questions'));
  }
}
