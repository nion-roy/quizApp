<?php

namespace App\Http\Controllers\User;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $toDate = \Carbon\Carbon::today()->toDateString();
    $exams = Exam::orderBy('exam_start', 'asc')->get();
    return view('user.exam.index', compact('exams'));
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
  public function show($slug)
  {
    $exam = Exam::where('slug', $slug)->first();
    return view('user.exam.show', compact('exam'));
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
}
