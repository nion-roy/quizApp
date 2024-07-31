<?php

namespace App\Repositories;

use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Interfaces\ExamRepositoryInterface;

class ExamRepository implements ExamRepositoryInterface
{
  public function getAll()
  {
    if (Auth::check() && Auth::user()->hasRole('super-admin')) {
      return Exam::latest('id')->get();
    } else {
      return Exam::where('user_id', Auth::id())->latest('id')->get();
    }
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
