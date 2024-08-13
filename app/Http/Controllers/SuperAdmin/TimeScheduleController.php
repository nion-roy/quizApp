<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use App\Models\TimeSchedule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TimeScheduleRequest;
use App\Repositories\Interfaces\TimeScheduleRepositoryInterface;

class TimeScheduleController extends Controller
{

  protected $TimeScheduleRepository;
  public function __construct(TimeScheduleRepositoryInterface $TimeScheduleRepository)
  {
    $this->TimeScheduleRepository = $TimeScheduleRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $timeSchedules = $this->TimeScheduleRepository->getAll();
    return view('super-admin.timeSchedule.index', compact('timeSchedules'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.timeSchedule.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(TimeScheduleRequest $request)
  {

    $existingTimeSchedule = TimeSchedule::where('start_class', $request->start_class)->where('end_class', $request->end_class)->first();

    if ($existingTimeSchedule) {
      $error = 'The time schedule from ' . Carbon::parse($request->start_class)->format('h:i A') . ' to ' . Carbon::parse($request->start_class)->format('h:i A') . ' already exists.';
      return redirect()->back()->withInput()->withErrors(['time_schedule' => $error]);
    }

    $this->TimeScheduleRepository->create($request->validated());
    return redirect()->back()->withSuccess('You have created the time schedule successfully.');
  }



  /**
   * Display the specified resource.
   */
  public function show(TimeSchedule $timeSchedule)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(TimeSchedule $timeSchedule)
  {
    $timeSchedule =  $this->TimeScheduleRepository->getById($timeSchedule->id);
    return view('super-admin.timeSchedule.edit', compact('timeSchedule'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(TimeScheduleRequest $request, TimeSchedule $timeSchedule)
  {
    $existingTimeSchedule = TimeSchedule::where('start_class', $request->start_class)
      ->where('end_class', $request->end_class)
      ->where('id', '!=', $timeSchedule->id) // Exclude the current schedule from the check
      ->first();

    if ($existingTimeSchedule) {
      $error = 'The time schedule from ' . Carbon::parse($request->start_class)->format('h:i A') .
        ' to ' . Carbon::parse($request->end_class)->format('h:i A') . ' already exists.';
      return redirect()->back()->withInput()->withErrors(['time_schedule' => $error]);
    }

    $this->TimeScheduleRepository->update($timeSchedule->id, $request->validated());
    return redirect()->back()->with('success', 'You have updated the time schedule successfully.');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(TimeSchedule $timeSchedule)
  {
    $this->TimeScheduleRepository->destroy($timeSchedule->id);
    return redirect()->back()->with('success', 'You have delete to timeSchedule successfully.');
  }
}
