<?php

namespace App\Http\Controllers\User;

use App\Models\MCQTest;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\MCQTestResult;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PracticeController extends Controller
{

  public function elt_index()
  {
    $questions = Question::where('status', true)->inRandomOrder()->take(10)->get();
    return view('user.mcq.create', compact('questions'));
  }


  public function elt_store(Request $request)
  {
    // Create a new MCQTest instance
    $MCQTest = new MCQTest();
    $MCQTest->user_id = Auth::id();
    $MCQTest->total_time = $request->total_time;
    $MCQTest->use_time = $request->use_time;
    $MCQTest->save();

    foreach ($request->question_id as $question_id) {
      $selected_option_id = $request->input('option.' . $question_id);
      $MCQTestResult = new MCQTestResult();
      $MCQTestResult->mcq_test_id = $MCQTest->id;
      $MCQTestResult->question_id = $question_id;
      $MCQTestResult->option_id = $selected_option_id;
      $MCQTestResult->save();
    }

    $MCQTestResult = MCQTestResult::where('mcq_test_id', $MCQTest->id)->get();
    // Redirect or return a response
    return response()->json(['url' => route('user.practice.success')]);
  }


  public function elt_success()
  {
    return view('user.mcq.success-message');
  }


  public function elt_result()
  {
    $results = MCQTest::latest('id')->get();
    // return $questions;
    return view('user.mcq.index', compact('results'));
  }


  public function elt_result_show($id)
  {
    $mcqTest = MCQTest::findOrFail($id);

    // Check if the authenticated user is the owner of the test
    if ($mcqTest->user_id !== Auth::id()) {
      Alert::error('You are not authorized to access these results');
      return redirect()->back();
    }

    $results = MCQTestResult::where('mcq_test_id', $mcqTest->id)->get();

    return view('user.mcq.result', compact('mcqTest', 'results'));
  }

  public function elt_destroy(string $id)
  {
    MCQTest::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'You have delete to practice mcq successfully.');
  }
}
