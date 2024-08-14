<?php

namespace App\Repositories;

use App\Models\ClassRoutine;
use App\Repositories\Interfaces\ClassRoutineRepositoryInterface;

class ClassRoutineRepository implements ClassRoutineRepositoryInterface
{
  public function getAll()
  {
    return ClassRoutine::latest('id')->get();
  }

  public function getById($id)
  {
    return ClassRoutine::findOrFail($id);
  }

  public function create(array $data)
  {
    return ClassRoutine::createClassRoutine($data);
  }

  public function update(int $id, array $data)
  {
    return ClassRoutine::updateClassRoutine($id, $data);
  }

  public function destroy($id)
  {
    return ClassRoutine::destroyClassRoutine($id);
  }
}
