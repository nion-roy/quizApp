<?php

namespace App\Repositories;

use App\Models\Routine;
use App\Repositories\Interfaces\RoutineRepositoryInterface;

class RoutineRepository implements RoutineRepositoryInterface
{
  public function getAll()
  {
    return Routine::with('user')->latest('id')->get();
  }

  public function getById($id)
  {
    return Routine::findOrFail($id);
  }

  public function create(array $data)
  {
    return Routine::createRoutine($data);
  }

  public function update(int $id, array $data)
  {
    return Routine::updateRoutine($id, $data);
  }

  public function destroy($id)
  {
    return Routine::destroyRoutine($id);
  }
}
