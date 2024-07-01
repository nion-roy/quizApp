<?php

namespace App\Repositories;

use App\Models\Subject;
use App\Repositories\Interfaces\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
  public function getAll()
  {
    return Subject::latest('id')->get();
  }

  public function getById($id)
  {
    return Subject::findOrFail($id);
  }

  public function create(array $data)
  {
    return Subject::createSubject($data);
  }

  public function update(int $id, array $data)
  {
    return Subject::updateSubject($id, $data);
  }

  public function destroy($id)
  {
    return Subject::destroySubject($id);
  }
}
