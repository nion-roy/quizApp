<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\MCQTest;
use App\Models\Question;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
    $validated = $request->validate([
      'department_id' => 'required',
      'subject_id' => 'required',
    ]);

    $questions = Question::where('department_id', $validated['department_id'])->where('subject_id', $validated['subject_id'])->where('status', true)->inRandomOrder()->take(10)->get();
    return view('super-admin.mcq.create', compact('questions'));
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
        'use_time' => $request['use_time'],
        'total_questions' => $request['total_questions'],
      ]);
    }

    // Redirect or return a response
    return response()->json(['url' => route('super-admin.mcq-practice.index')]);
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
    MCQTest::where('user_id', $id)->delete();
  }

  public function elt_pdf()
  {
    $mcqResults = MCQTest::where('user_id', Auth::id())->with(['question', 'answer'])->get();
    $questions = $mcqResults->pluck('question')->unique();
    $questionAnswer = $mcqResults->pluck('answer')->unique();


    // $html = View::make('super-admin.mcq.pdf', compact('mcqResults', 'questions', 'questionAnswer'))->render();
    // $pdf = PDF::loadHTML($html);
    // $pdf->setPaper('A4', 'portrait');
    // return $pdf->download('example.pdf');


    $pdf = Pdf::loadView('super-admin.mcq.pdf', compact('mcqResults', 'questions', 'questionAnswer'))->setPaper('a4', 'landscape');
    return $pdf->download(uniqid() . '.pdf');

    // return view('super-admin.mcq.pdf', compact('mcqResults', 'questions', 'questionAnswer'));
  }
}
