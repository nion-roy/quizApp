<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequest;
use App\Models\Trainer;
use App\Repositories\Interfaces\TrainerRepositoryInterface;

class TrainerController extends Controller
{

  protected $TrainerRepository;
  public function __construct(TrainerRepositoryInterface $TrainerRepository)
  {
    $this->TrainerRepository = $TrainerRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $trainers = $this->TrainerRepository->getAll();
    return view('super-admin.trainer.index', compact('trainers'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.trainer.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TrainerRequest $request)
  {
    $this->TrainerRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to trainer successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Trainer $trainer)
  {
    $trainer =  $this->TrainerRepository->getById($trainer->id);
    return view('super-admin.trainer.show', compact('trainer'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Trainer $trainer)
  {
    $trainer =  $this->TrainerRepository->getById($trainer->id);
    return view('super-admin.trainer.edit', compact('trainer'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TrainerRequest $request, Trainer $trainer)
  {
    $this->TrainerRepository->update($trainer->id, $request->validated());
    return redirect()->back()->with('success', 'You have update to trainer successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Trainer $trainer)
  {
    $this->TrainerRepository->destroy($trainer->id);
    return redirect()->back()->with('success', 'You have delete to trainer successfully.');
  }
}
