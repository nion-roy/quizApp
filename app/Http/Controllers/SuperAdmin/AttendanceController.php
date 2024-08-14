<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Attendance;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttendanceRequest;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Student;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

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
  public function store(Request $request)
  {

    return $request;

    // $this->AttendanceRepository->create($request->validated());
    // return redirect()->back()->with('success', 'You have create to attendance successfully.');
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



  public function elt_attendances_branch_department($id)
  {
    $departments = Department::where('branch_id', $id)->where('status', true)->get();
    $departmentOptions = view('super-admin.attendance._department', compact('departments'))->render();
    return response()->json(['departments' => $departmentOptions]);
  }

  public function elt_attendances_branch_batch($id)
  {
    $batches = Batch::where('department_id', $id)->where('status', true)->get();
    $batchOptions = view('super-admin.attendance._batch', compact('batches'))->render();
    return response()->json(['batches' => $batchOptions]);
  }


  public function elt_attendance_students(Request $request)
  {
    $branchID  = $request->branchID;
    $departmentID  = $request->departmentID;
    $batchID  = $request->batchID;
    $groupValue  = $request->groupValue;

    // $students = Student::where('branch_id', $branchID)->where('department_id', $departmentID)->where('batch_id', $batchID)->where('group_name', $groupValue)->get();


    $students = Student::where('batch_id', $batchID)->where('group_name', $groupValue)->get();
    $studentOptions = view('super-admin.attendance._students', compact('students'))->render();
    return response()->json(['students' => $studentOptions]);
  }
}
