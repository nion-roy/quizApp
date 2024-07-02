<?php

namespace App\Repositories;

use App\Models\Exam;
use App\Repositories\Interfaces\ExamRepositoryInterface;

class ExamRepository implements ExamRepositoryInterface
{
  public function getAll()
  {
    return Exam::latest('id')->get();
  }

  public function getById($id)
  {
    return Exam::findOrFail($id);
  }

  public function create(array $data)
  {
    return Exam::createExam($data);
  }

  public function update(int $id, array $data)
  {
    return Exam::updateExam($id, $data);
  }

  public function destroy($id)
  {
    return Exam::destroyExam($id);
  }
}
