<?php

namespace App\Http\Controllers\User;

use App\Models\MCQTest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{

  public function elt_index()
  {
    $questions = Question::where('status', true)->inRandomOrder()->take(10)->get();
    return view('user.mcq.index', compact('questions'));
  }


  public function elt_store(Request $request)
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
        'use_time' => $request['use_time'],
        'total_questions' => $request['total_questions'],
      ]);
    }

    // Redirect or return a response
    return response()->json(['url' => route('user.practice.result')]);
  }

  public function elt_result()
  {
    $questions = DB::table('users')
      ->leftJoin('m_c_q_tests', 'user_id', '=', 'users.id')->get();
    return $questions;
    // return view('user.mcq.result', compact('questions'));
  }

  public function elt_destroy(string $id)
  {
    MCQTest::where('user_id', $id)->delete();
  }
}
