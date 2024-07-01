<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectController extends Controller
{
  protected $subjectRepository;
  public function __construct(SubjectRepositoryInterface $subjectRepository)
  {
    $this->subjectRepository = $subjectRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $subjects = $this->subjectRepository->getAll();
    return view('super-admin.subjects.index', compact('subjects'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.subjects.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(SubjectRequest $request)
  {
    $this->subjectRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to subject successfully.');
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
    $subject = $this->subjectRepository->getById($id);
    return view('super-admin.subjects.edit', compact('subject'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(SubjectRequest $request, string $id)
  {
    $this->subjectRepository->update($id, $request->validated());
    return redirect()->back()->with('success', 'You have update to subject successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $this->subjectRepository->destroy($id);
    return redirect()->back()->with('success', 'You have delete to subject successfully.');
  }
}
