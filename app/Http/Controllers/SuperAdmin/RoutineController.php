<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Routine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lab;

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
    $teachers = User::where('role_id', 3)->get();
    $labs = Lab::get();
    return view('super-admin.routine.create', compact('teachers', 'labs'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
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
}
