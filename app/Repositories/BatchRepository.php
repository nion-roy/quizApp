<?php

namespace App\Repositories;

use App\Models\Batch;
use App\Repositories\Interfaces\BatchRepositoryInterface;

class BatchRepository implements BatchRepositoryInterface
{
  public function getAll()
  {
    return Batch::latest('id')->get();
  }

  public function getById($id)
  {
    return Batch::findOrFail($id);
  }

  public function create(array $data)
  {
    return Batch::createBatch($data);
  }

  public function update(int $id, array $data)
  {
    return Batch::updateBatch($id, $data);
  }

  public function destroy($id)
  {
    return Batch::destroyBatch($id);
  }
}
