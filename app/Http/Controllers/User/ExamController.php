<?php

namespace App\Http\Controllers\User;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamResult;

class ExamController extends Controller
{
  public function index()
  {
    $toDate = \Carbon\Carbon::today()->toDateString();
    $exams = Exam::orderBy('exam_start', 'asc')->get();
    return view('user.exam.index', compact('exams'));
  }


  public function elt_exam($slug)
  {
    $exam = Exam::where('slug', $slug)->with('questions')->first();
    // $examQuestions = $exam->questions;
    return view('user.exam.show', compact('exam'));
  }

  public function elt_store(Request $request)
  {
    $examExists = ExamResult::where('exam_id', $request->exam_id)->where('user_id', auth()->id())->first();

    if ($examExists) {
      return 'Yor are already submitted exam question.!';
    } else {
      
      foreach ($request->question_id as $question_id) {
        $selected_option_id = $request->input('option.' . $question_id);
        $examResult = new ExamResult();
        $examResult->user_id = auth()->id();
        $examResult->exam_id = $request->exam_id;
        $examResult->question_id = $question_id;
        $examResult->option_id = $selected_option_id;
        $examResult->save();
      }

      return response()->json(['url' => route('user.practice.success')]);
    }
  }
}
