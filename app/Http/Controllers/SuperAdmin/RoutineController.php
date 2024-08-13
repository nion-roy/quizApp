<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Routine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    //
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
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Routine $routine)
  {

    return $routine;

    // $routine = $this->RoutineRepository->getById($routine->id);
    // return view('super-admin.routine.edit', compact('routine'));
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
