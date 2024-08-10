<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;

class AttendanceController extends Controller
{

  protected $AttendanceRepository;
  public function __construct(AttendanceRepositoryInterface $AttendanceRepository)
  {
    $this->AttendanceRepository = $AttendanceRepository;
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $attendances = $this->AttendanceRepository->getAll();
    return view('super-admin.attendance.index', compact('attendances'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('super-admin.attendance.index');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(AttendanceRequest $request)
  {
    $this->AttendanceRepository->create($request->validated());
    return redirect()->back()->with('success', 'You have create to attendance successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show(Attendance $attendance)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Attendance $attendance)
  {
    $attendance = $this->AttendanceRepository->getById($attendance->id);
    return view('super-admin.attendance.index', compact('attendance'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(AttendanceRequest $request, Attendance $attendance)
  {
    $this->AttendanceRepository->update($attendance->id, $request->validated());
    return redirect()->back()->with('success', 'You have update to attendance successfully.');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Attendance $attendance)
  {
    $this->AttendanceRepository->destroy($attendance->id);
    return redirect()->back()->with('success', 'You have delete to attendance successfully.');
  }
}
