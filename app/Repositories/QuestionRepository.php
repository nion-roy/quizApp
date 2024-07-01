<?php

namespace App\Repositories;

use App\Models\Question;
use App\Repositories\Interfaces\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{
  public function getAll()
  {
    return Question::latest('id')->get();
  }

  public function getById($id)
  {
    return Question::findOrFail($id);
  }

  public function create(array $data)
  {
    return Question::createQuestion($data);
  }

  public function update(int $id, array $data)
  {
    return Question::updateQuestion($id, $data);
  }

  public function destroy($id)
  {
    return Question::destroyQuestion($id);
  }
}
