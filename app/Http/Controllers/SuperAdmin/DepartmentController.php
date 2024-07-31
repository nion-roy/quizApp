<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentController extends Controller implements HasMiddleware
{
  public static function middleware(): array
  {
    return [
      new Middleware('permission:view department', only: ['index']),
      new Middleware('permission:create department', only: ['create']),
      new Middleware('permission:update department', only: ['edit']),
      new Middleware('permission:delete department', only: ['destroy']),
    ];
  }

  protected $departmentRepository;

  public function __construct(DepartmentRepositoryInterface $departmentRepository)
  {
    $this->departmentRepository = $departmentRepository;
  }


  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $departments = $this->departmentRepository->getAll();
    return view("super-admin.departments.index", compact("departments"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view("super-admin.departments.create");
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(DepartmentRequest $request)
  {
    $this->departmentRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to department successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $department = $this->departmentRepository->getById($id);
    return view('super-admin.departments.edit', compact('department'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(DepartmentRequest $request, string $id)
  {
    $this->departmentRepository->update($id, $request->validated());
    return redirect()->back()->with('success', 'You have update to department successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->departmentRepository->destroy($id);
    return redirect()->back()->with('success', 'You have delete to department successfully.');
  }
}
