<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Batch;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
  protected $StudentRepository;
  public function __construct(StudentRepositoryInterface $StudentRepository)
  {
    $this->StudentRepository = $StudentRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $students = $this->StudentRepository->getAll();
    return view('super-admin.student.index', compact('students'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.student.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StudentRequest $request)
  {
    $this->StudentRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to student successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Student $student)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Student $student)
  {
    $student = $this->StudentRepository->getById($student->id);
    return view('super-admin.student.edit', compact('student'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(StudentRequest $request, Student $student)
  {
    $this->StudentRepository->update($student->id, $request->validated());
    return redirect()->back()->with('success', 'You have update to student successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Student $student)
  {
    $this->StudentRepository->destroy($student->id);
    return redirect()->back()->with('success', 'You have delete to student successfully.');
  }



  public function elt_branch_batch($id)
  {
    if ($id > 0) {
      $batches = Batch::where('branch_id', $id)->where('status', true)->get();
    }
    $studentBatchId = request()->get('student_batch_id');
    return view('super-admin.student._batch', compact('batches', 'studentBatchId'))->render();
  }
}
