<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Department;
use App\Models\QuestionOption;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionController extends Controller
{

  protected $questionRepository;
  public function __construct(QuestionRepositoryInterface $questionRepository)
  {
    $this->questionRepository = $questionRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $questions = $this->questionRepository->getAll();
    return view('super-admin.questions.index', compact('questions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $subjects = Subject::where('status', true)->get();
    $departments = Department::where('status', true)->get();
    return view('super-admin.questions.create', compact('subjects', 'departments'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(QuestionRequest $request)
  {
    $this->questionRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to question successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $question = $this->questionRepository->getById($id);
    $questionOptions = QuestionOption::where('question_id', $question->id)->get();
    return view('super-admin.questions.show', compact('question', 'questionOptions'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $subjects = Subject::where('status', true)->get();
    $departments = Department::where('status', true)->get();
    $question = $this->questionRepository->getById($id);
    $questionOptions = QuestionOption::where('question_id', $question->id)->get();
    return view('super-admin.questions.edit', compact('subjects', 'departments', 'question', 'questionOptions'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(QuestionRequest $request, string $id)
  {
    $this->questionRepository->update($id, $request->validated());
    return redirect()->back()->with('success', 'You have update to question successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->questionRepository->destroy($id);
    return redirect()->back()->with('success', 'You have delete to question successfully.');
  }


  public function getSubject($id)
  {
    $subjects = Subject::where('status', true)->where('department_id', $id)->get();
    return $subjects;
  }
}
