<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\MCQTest;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MCQTestController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('super-admin.mcq.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(Request $request)
  {
    $questions = Question::where('department_id', $request->department_id)->where('subject_id', $request->subject_id)->where('status', true)->inRandomOrder()->take(10)->get();
    return view('super-admin.mcq.searching', compact('questions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    // Iterate through the submitted questions and answers
    foreach ($request['question_id'] as $questionId) {
      $answerId = $request['answer'][$questionId] ?? null;

      // Save the result to the database
      MCQTest::create([
        'user_id' => Auth::id(),
        'question_id' => $questionId,
        'answer_id' => $answerId,
        'total_time' => $request['total_time'],
        'total_questions' => $request['total_questions'],
      ]);
    }

    // Redirect or return a response
    // return redirect()->json('url' => route('super-admin.mcq-practice.index'));
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

}
