<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Models\Branch;
use App\Repositories\Interfaces\BranchRepositoryInterface;
use Illuminate\Http\Request;

class BranchController extends Controller
{

  protected $BranchRepository;
  public function __construct(BranchRepositoryInterface $BranchRepository)
  {
    $this->BranchRepository = $BranchRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $branches = $this->BranchRepository->getAll();
    return view('super-admin.branch.index', compact('branches'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.branch.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(BranchRequest $request)
  {
    $this->BranchRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to branch successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Branch $branch)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Branch $branch)
  {
    $branch = $this->BranchRepository->getById($branch->id);
    return view('super-admin.branch.edit', compact('branch'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(BranchRequest $request, Branch $branch)
  {
    $this->BranchRepository->update($branch->id, $request->validated());
    return redirect()->back()->with('success', 'You have update to branch successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Branch $branch)
  {
    $this->BranchRepository->destroy($branch->id);
    return redirect()->back()->with('success', 'You have delete to branch successfully.');
  }
}
