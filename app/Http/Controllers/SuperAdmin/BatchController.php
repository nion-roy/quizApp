<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Batch;
use App\Http\Requests\BatchRequest;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Repositories\Interfaces\BatchRepositoryInterface;

class BatchController extends Controller
{
  protected $BatchRepository;
  public function __construct(BatchRepositoryInterface $BatchRepository)
  {
    $this->BatchRepository = $BatchRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $batches = $this->BatchRepository->getAll();
    return view('super-admin.batch.index', compact('batches'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.batch.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(BatchRequest $request)
  {
    $this->BatchRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to batch successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Batch $batch)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Batch $batch)
  {
    $batch = $this->BatchRepository->getById($batch->id);
    return view('super-admin.batch.edit', compact('batch'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(BatchRequest $request, Batch $batch)
  {
    $this->BatchRepository->update($batch->id, $request->validated());
    return redirect()->back()->with('success', 'You have update to batch successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Batch $batch)
  {
    $this->BatchRepository->destroy($batch->id);
    return redirect()->back()->with('success', 'You have delete to batch successfully.');
  }


  public function elt_branch_department($id)
  {
    $departmentID = request()->get('department_batch_id');
    $departments = Department::where('branch_id', $id)->where('status', true)->get();
    $departmentOptions = view('super-admin.batch._department', compact('departments', 'departmentID'))->render();

    return response()->json(['departments' => $departmentOptions]);
  }
}
