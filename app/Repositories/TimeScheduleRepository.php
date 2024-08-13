<?php

namespace App\Repositories;

use App\Models\TimeSchedule;
use App\Repositories\Interfaces\TimeScheduleRepositoryInterface;

class TimeScheduleRepository implements TimeScheduleRepositoryInterface
{
  public function getAll()
  {
    return TimeSchedule::get();
  }

  public function getById($id)
  {
    return TimeSchedule::findOrFail($id);
  }

  public function create(array $data)
  {
    return TimeSchedule::createTimeSchedule($data);
  }

  public function update(int $id, array $data)
  {
    return TimeSchedule::updateTimeSchedule($id, $data);
  }

  public function destroy($id)
  {
    return TimeSchedule::destroyTimeSchedule($id);
  }
}
