<?php

namespace App\Repositories;

use App\Models\Trainer;
use App\Repositories\Interfaces\TrainerRepositoryInterface;

class TrainerRepository implements TrainerRepositoryInterface
{
  public function getAll()
  {
    return Trainer::with('user')->latest('id')->get();
  }

  public function getById($id)
  {
    return Trainer::findOrFail($id);
  }

  public function create(array $data)
  {
    return Trainer::createTrainer($data);
  }

  public function update(int $id, array $data)
  {
    return Trainer::updateTrainer($id, $data);
  }

  public function destroy($id)
  {
    return Trainer::destroyTrainer($id);
  }
}
