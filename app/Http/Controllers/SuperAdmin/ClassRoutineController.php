<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Lab;
use App\Models\User;
use App\Models\Batch;
use App\Models\Branch;
use App\Models\Department;
use App\Models\ClassRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ClassRoutineRequest;
use App\Repositories\Interfaces\ClassRoutineRepositoryInterface;

class ClassRoutineController extends Controller
{

  protected $ClassRoutineRepository;
  public function __construct(ClassRoutineRepositoryInterface $ClassRoutineRepository)
  {
    $this->ClassRoutineRepository = $ClassRoutineRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $routines = $this->ClassRoutineRepository->getAll();
    return view('super-admin.routine.index', compact('routines'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.routine.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(ClassRoutineRequest $request)
  {
    // Check for existing routine with the same lab, day, and time range
    $existingRoutineLab = ClassRoutine::where('lab_id', $request->lab)
      ->where('day', $request->day)
      ->where('time_schedule_id', $request->time_schedule)
      ->exists();

    // Check for existing routine with the same trainer, day, and time range
    $existingRoutineTrainer = ClassRoutine::where('trainer_id', $request->trainer)
      ->where('day', $request->day)
      ->where('time_schedule_id', $request->time_schedule)
      ->exists();

    // Return error if the lab is already scheduled
    if ($existingRoutineLab) {
      return response()->json(['error' => 'A routine already exists for the selected lab on ' . $request->day . ' with the selected time schedule.']);
    }

    // Return error if the trainer is already scheduled
    if ($existingRoutineTrainer) {
      return response()->json(['error' => 'The trainer is already scheduled for another class on ' . $request->day . ' with the selected time schedule.']);
    }

    // Create the class routine
    $this->ClassRoutineRepository->create($request->validated());

    // Flash success message to session and return success response
    Session::flash('success', 'You have created the class routine successfully.');
    return response()->json(['success' => true]);
  }


  /**
   * Display the specified resource.
   */
  public function show(ClassRoutine $classRoutine)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ClassRoutine $classRoutine)
  {
    $classRoutine = $this->ClassRoutineRepository->getById($classRoutine->id);
    return view('super-admin.routine.edit', compact('classRoutine'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(ClassRoutineRequest $request, ClassRoutine $classRoutine)
  {
    // Check for existing routine with the same lab, day, and time range
    $existingRoutineLab = ClassRoutine::where('lab_id', $request->lab)
      ->where('day', $request->day)
      ->where('time_schedule_id', '!=', $request->time_schedule)
      ->exists();

    // Check for existing routine with the same trainer, day, and time range
    $existingRoutineTrainer = ClassRoutine::where('trainer_id', $request->trainer)
      ->where('day', $request->day)
      ->where('time_schedule_id', '!=', $request->time_schedule)
      ->exists();

    if ($existingRoutineLab) {
      return response()->json(['error' => 'A routine already exists for the selected lab on ' . $request->day . ' with the selected time schedule.']);
    }

    if ($existingRoutineTrainer) {
      return response()->json(['error' => 'The trainer is already scheduled for another class on ' . $request->day . ' with the selected time schedule.']);
    }

    $this->ClassRoutineRepository->update($classRoutine->id, $request->validated());
    Session::flash('success', 'You have update to class routine successfully.');
    return response()->json(['success' => true]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ClassRoutine $classRoutine)
  {
    $this->ClassRoutineRepository->destroy($classRoutine->id);
    return redirect()->back()->with('success', 'You have delete to class routine successfully.');
  }



  public function elt_branch_batch($id)
  {
    $departmentID = request()->get('branch_department_id');
    $labID = request()->get('branch_lab_id');
    $trainerID = request()->get('branch_trainer_id');

    $labs = Lab::where('branch_id', $id)->get();
    $trainers = User::where('branch_id', $id)->where('status', true)->get();
    $departments = Department::where('branch_id', $id)->where('status', true)->get();

    $departmentOptions = view('super-admin.routine._department', compact('departments', 'departmentID'))->render();
    $labOptions = view('super-admin.routine._lab', compact('labs', 'labID'))->render();
    $trainerOptions = view('super-admin.routine._trainer', compact('trainers', 'trainerID'))->render();

    return response()->json([
      'labs' => $labOptions,
      'trainers' => $trainerOptions,
      'departments' => $departmentOptions
    ]);
  }

  public function elt_department_batch($id)
  {
    $batchID = request()->get('department_batch_id');
    $batches = Batch::where('department_id', $id)->where('status', true)->get();

    $batchOptions = view('super-admin.routine._batch', compact('batches', 'batchID'))->render();
    return response()->json(['batches' => $batchOptions]);
  }

  public function elt_routine_filter(Request $request)
  {
    $branch = $request->branch;
    $department = $request->department;
    $batch = $request->batch;
    $lab = $request->lab;

    if ($branch && $department && $batch && $lab) {
      $routines = ClassRoutine::with(['branch', 'department', 'batch', 'lab', 'trainer.user'])->where('branch_id', $branch)->where('department_id', $department)->where('batch_id', $batch)->where('lab_id', $lab)->get();
    } else if ($branch && $department && $batch) {
      $routines = ClassRoutine::with(['branch', 'department', 'batch', 'lab', 'trainer.user'])->where('branch_id', $branch)->where('department_id', $department)->where('batch_id', $batch)->get();
    } else if ($branch && $department && $lab) {
      $routines = ClassRoutine::with(['branch', 'department', 'batch', 'lab', 'trainer.user'])->where('branch_id', $branch)->where('department_id', $department)->where('lab_id', $lab)->get();
    } else {
      $routines = ClassRoutine::with(['branch', 'department', 'trainer.user'])->where('branch_id', $branch)->where('department_id', $department)->get();
    }


    // Fetch the related names in a single query
    $branchName = Branch::find($branch);
    $departmentName = Department::find($department);
    $batchName = Batch::find($batch);
    $labName = Lab::find($lab);

    return view('super-admin.routine.routine', compact('routines', 'branchName', 'departmentName', 'batchName', 'labName'));
  }
}
