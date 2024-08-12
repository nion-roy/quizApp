<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Lab;
use App\Models\User;
use App\Models\Batch;
use App\Models\Routine;
use App\Models\Trainer;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    // $routines = Routine::latest()->get();
    return view('super-admin.routine.index');
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
  public function store(Request $request)
  {
    // return $request;

    $request->validate([
      'branch' => 'required',
      'department' => 'required',
      'batch' => 'required',
      'lab' => 'required',
      'trainer' => 'required',
      'day' => 'required',
      'start_class' => 'required|date_format:H:i',
      'end_class' => 'required|date_format:H:i|after:start_class',
    ]);

    $routine = new Routine();
    $routine->user_id  =  Auth::id();
    $routine->branch_id  =  $request->branch;
    $routine->department_id  =  $request->department;
    $routine->batch_id  =  $request->batch;
    $routine->lab_id  =  $request->lab;
    $routine->trainer_id  =  $request->trainer;
    $routine->day  =  $request->day;
    $routine->start_class  =  $request->start_class;
    $routine->end_class  =  $request->end_class;
    $routine->save();

    return redirect()->back()->with('success', 'You have create to routine successfully.');
  }


  /**
   * Display the specified resource.
   */
  public function show(Routine $routine)
  {
    return view('super-admin.routine.show');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Routine $routine)
  {
    return view('super-admin.routine.edit');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Routine $routine)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Routine $routine)
  {
    //
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
