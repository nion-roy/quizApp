<?php

namespace App\Repositories;

use App\Models\Department;
use App\Repositories\Interfaces\DepartmentRepositoryInterface;

class DepartmentRepository implements DepartmentRepositoryInterface
{
  public function getAll()
  {
    return Department::latest('id')->get();
  }

  public function getById($id)
  {
    return Department::findOrFail($id);
  }

  public function create(array $data)
  {
    return Department::createDepartment($data);
  }

  public function update(int $id, array $data)
  {
    return Department::updateDepartment($id, $data);
  }

  public function destroy($id)
  {
    return Department::destroyDepartment($id);
  }
}
