<?php

namespace App\Repositories;

use App\Models\Attendance;
use App\Repositories\Interfaces\AttendanceRepositoryInterface;

class AttendanceRepository implements AttendanceRepositoryInterface
{
  public function getAll()
  {
    return Attendance::with('user')->latest('id')->get();
  }

  public function getById($id)
  {
    return Attendance::findOrFail($id);
  }

  public function create(array $data)
  {
    return Attendance::createAttendance($data);
  }

  public function update(int $id, array $data)
  {
    return Attendance::updateAttendance($id, $data);
  }

  public function destroy($id)
  {
    return Attendance::destroyAttendance($id);
  }
}
