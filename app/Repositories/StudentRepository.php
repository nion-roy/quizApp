<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
  public function getAll()
  {
    return Student::with('user')->latest('id')->get();
  }

  public function getById($id)
  {
    return Student::findOrFail($id);
  }

  public function create(array $data)
  {
    return Student::createStudent($data);
  }

  public function update(int $id, array $data)
  {
    return Student::updateStudent($id, $data);
  }

  public function destroy($id)
  {
    return Student::destroyStudent($id);
  }
}
