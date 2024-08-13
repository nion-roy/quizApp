<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Requests\RoutineRequest;
use App\Models\Lab;
use App\Models\User;
use App\Models\Batch;
use App\Models\Routine;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interfaces\RoutineRepositoryInterface;

class RoutineController extends Controller
{

  protected $RoutineRepository;
  public function __construct(RoutineRepositoryInterface $RoutineRepository)
  {
    $this->RoutineRepository = $RoutineRepository;
  }



  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $routines = $this->RoutineRepository->getAll();
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


  public function store(RoutineRequest $request)
  {
    // Check for existing routine with the same lab, day, and time range
    $existingRoutineLab = Routine::where('lab_id', $request->lab)
      ->where('day', $request->day)
      ->where('time_schedule_id', $request->time_schedule)
      ->exists();

    // Check for existing routine with the same trainer, day, and time range
    $existingRoutineTrainer = Routine::where('trainer_id', $request->trainer)
      ->where('day', $request->day)
      ->where('time_schedule_id', $request->time_schedule)
      ->exists();

    if ($existingRoutineLab) {
      return response()->json(['error' => 'A routine already exists for the selected lab on ' . $request->day . ' with the selected time schedule.']);
    }

    if ($existingRoutineTrainer) {
      return response()->json(['error' => 'The trainer is already scheduled for another class on ' . $request->day . ' with the selected time schedule.']);
    }

    $this->RoutineRepository->create($request->validated());
    Session::flash('success', 'You have create to routine successfully.');
    return response()->json(['success' => true]);
  }



  /**
   * Display the specified resource.
   */
  public function show(Routine $routine)
  {
    $classRoutine = Routine::findOrFail($routine->id);
    return $classRoutine;
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Routine $routine)
  {
    $routine = Routine::findOrFail($routine->id);
    return view('super-admin.routine.edit', compact('routine'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(RoutineRequest $request, Routine $routine)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Routine $routine)
  {
    $this->RoutineRepository->destroy($routine->id);
    return redirect()->back()->with('success', 'You have delete to batch successfully.');
  }


  public function elt_branch_batch($id)
  {
    $batches = Batch::where('branch_id', $id)->where('status', true)->get();
    $labs = Lab::where('branch_id', $id)->get();
    $trainers = User::where('branch_id', $id)->where('status', true)->get();
    $departments = Department::where('branch_id', $id)->where('status', true)->get();

    $batchOptions = view('super-admin.routine._batch', compact('batches'))->render();
    $labOptions = view('super-admin.routine._lab', compact('labs'))->render();
    $trainerOptions = view('super-admin.routine._trainer', compact('trainers'))->render();
    $departmentOptions = view('super-admin.routine._department', compact('departments'))->render();

    return response()->json(['batches' => $batchOptions, 'labs' => $labOptions, 'trainers' => $trainerOptions, 'departments' => $departmentOptions]);
  }

  public function elt_department_batch($id)
  {
    $batches = Batch::where('department_id', $id)->where('status', true)->get();
    $batchOptions = view('super-admin.routine._batch', compact('batches'))->render();
    return response()->json(['batches' => $batchOptions]);
  }
}
