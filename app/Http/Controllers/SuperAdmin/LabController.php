<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LabsRequest;
use App\Models\Lab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $labs = Lab::latest()->get();
    return view('super-admin.lab.index', compact('labs'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.lab.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(LabsRequest $request)
  {
    $lab = new Lab();
    $lab->user_id = Auth::id();
    $lab->branch_id = $request['branch'];
    $lab->lab_name = $request['lab_name'];
    $lab->min_set = $request['min_set'];
    $lab->max_set = $request['max_set'];
    $lab->save();
    return redirect()->back()->with('success', 'You have create to lab successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Lab $lab)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Lab $lab)
  {
    $lab = Lab::findOrFail($lab->id);
    return view('super-admin.lab.edit', compact('lab'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(LabsRequest $request, Lab $lab)
  {
    $lab = Lab::findOrFail($lab->id);
    $lab->branch_id = $request['branch'];
    $lab->lab_name = $request['lab_name'];
    $lab->min_set = $request['min_set'];
    $lab->max_set = $request['max_set'];
    $lab->save();
    return redirect()->back()->with('success', 'You have update to lab successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Lab $lab)
  {
    Lab::findOrFail($lab->id)->delete();
    return redirect()->back()->with('success', 'You have delete to lab successfully.');
  }
}
