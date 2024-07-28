<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Exam;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $exams = Exam::orderBy('exam_start')->get();
    return view('super-admin.exam.index', compact('exams'));
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
    $validated = $request->validate([
      'department_id' => 'required',
      'subject_id' => 'required',
      'exam_name' => 'required',
      'exam_start' => 'required',
      'exam_end' => 'required',
      'exam_mark' => 'required',
      'question_type' => 'required',
      'status' => 'required',
    ]);

    $exam = new Exam();
    $exam->user_id = Auth::id();
    $exam->department_id = $validated['department_id'];
    $exam->subject_id = $validated['subject_id'];
    $exam->exam_name = $validated['exam_name'];
    $exam->slug = Str::slug($validated['exam_name']);
    $exam->exam_start = Carbon::parse($validated['exam_start']);
    $exam->exam_end = Carbon::parse($validated['exam_end']);
    $exam->exam_mark = $validated['exam_mark'];
    $exam->question_type = $validated['question_type'];
    $exam->status = $validated['status'];
    $exam->save();

    if ($validated['question_type'] == 1) {
      $questions = Question::where('status', true)->where('subject_id', $exam->subject_id)->inRandomOrder()->take(10)->get();
      foreach ($questions as $question) {
        $examQuestion = new ExamQuestion();
        $examQuestion->user_id = Auth::id();
        $examQuestion->exam_id = $exam->id;
        $examQuestion->question_id = $question->id;
        $examQuestion->save();
      }
    } else {

      if (isset($request->question_id)) {
        foreach ($request->question_id as $index) {
          $examQuestion = new ExamQuestion();
          $examQuestion->user_id = Auth::id();
          $examQuestion->exam_id = $exam->id;
          $examQuestion->question_id = $index;
          $examQuestion->save();
        }
      } else {
        $questions = Question::where('status', true)->where('subject_id', $exam->subject_id)->inRandomOrder()->take(10)->get();
        foreach ($questions as $question) {
          $examQuestion = new ExamQuestion();
          $examQuestion->user_id = Auth::id();
          $examQuestion->exam_id = $exam->id;
          $examQuestion->question_id = $question->id;
          $examQuestion->save();
        }
      }
    }


    return redirect()->back()->with('success', 'Exam and questions created successfully.');
  }


  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $exam = Exam::findOrFail($id);
    return view('super-admin.exam.show', compact('exam'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $exam = Exam::findOrFail($id);
    $departments = Department::where('status', true)->get();
    $subjects = Subject::where('status', true)->get();
    $examQuestions = ExamQuestion::where('exam_id', $id)->pluck('question_id')->toArray();
    return view('super-admin.exam.edit', compact('exam', 'departments', 'subjects', 'examQuestions'));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    // Validate the incoming request data
    $validated = $request->validate([
      'department_id' => 'required',
      'subject_id' => 'required',
      'exam_name' => 'required',
      'exam_start' => 'required',
      'exam_end' => 'required',
      'exam_mark' => 'required|numeric',
      'question_type' => 'required|boolean',
      'status' => 'required|boolean',
    ]);

    // Find the exam or fail if it doesn't exist
    $exam = Exam::findOrFail($id);

    // Update exam details
    $exam->user_id = Auth::id();
    $exam->department_id = $validated['department_id'];
    $exam->subject_id = $validated['subject_id'];
    $exam->exam_name = $validated['exam_name'];
    $exam->slug = Str::slug($validated['exam_name']);
    $exam->exam_start = Carbon::parse($validated['exam_start']);
    $exam->exam_end = Carbon::parse($validated['exam_end']);
    $exam->exam_mark = $validated['exam_mark'];
    $exam->question_type = $validated['question_type'];
    $exam->status = $validated['status'];
    $exam->save();

    // Delete existing questions associated with the exam
    ExamQuestion::where('exam_id', $exam->id)->delete();

    // Add new questions based on the question_type == random
    if ($validated['question_type'] == 1) {
      $questions = Question::where('status', true)->where('subject_id', $exam->subject_id)->inRandomOrder()->take(10)->get();
      foreach ($questions as $question) {
        $examQuestion = new ExamQuestion();
        $examQuestion->user_id = Auth::id();
        $examQuestion->exam_id = $exam->id;
        $examQuestion->question_id = $question->id;
        $examQuestion->save();
      }
    } else {
      //Question selected
      if (isset($request->question_id)) {
        foreach ($request->question_id as $index) {
          $examQuestion = new ExamQuestion();
          $examQuestion->user_id = Auth::id();
          $examQuestion->exam_id = $exam->id;
          $examQuestion->question_id = $index;
          $examQuestion->save();
        }
      } else {
        //Question random
        $questions = Question::where('status', true)->where('subject_id', $exam->subject_id)->inRandomOrder()->take(10)->get();
        foreach ($questions as $question) {
          $examQuestion = new ExamQuestion();
          $examQuestion->user_id = Auth::id();
          $examQuestion->exam_id = $exam->id;
          $examQuestion->question_id = $question->id;
          $examQuestion->save();
        }
      }
    }

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Exam and questions updated successfully.');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Exam::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Exam and questions delete successfully.');
  }

  public function getQuestion($id)
  {
    $questions = Question::where('status', true)->where('subject_id', $id)->latest('id')->get();
    return $questions;
  }

  public function elt_pdf_question($id)
  {
    $exam = Exam::findOrFail($id);

    // Create Dompdf instance
    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Roboto'); // Set the default font for Dompdf
    $dompdf = new Dompdf($pdfOptions);

    // Load HTML content (Blade view)
    $html = view('super-admin.exam.pdf', compact('exam'))->render();

    // Load HTML into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF (important for fonts and styles to be applied)
    $dompdf->render();

    // Output the generated PDF to Browser (stream)
    return $dompdf->stream(uniqid() . '.pdf');
  }


  public function elt_status_question($examId)
  {
    $exam = Exam::findOrFail($examId);
    $exam->status = 2;
    $exam->save();

    return response()->json(['success' => true]);
  }
}
