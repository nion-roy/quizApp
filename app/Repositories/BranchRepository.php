<?php

namespace App\Repositories;

use App\Models\Branch;
use App\Repositories\Interfaces\BranchRepositoryInterface;

class BranchRepository implements BranchRepositoryInterface
{
  public function getAll()
  {
    return Branch::latest('id')->get();
  }

  public function getById($id)
  {
    return Branch::findOrFail($id);
  }

  public function create(array $data)
  {
    return Branch::createBranch($data);
  }

  public function update(int $id, array $data)
  {
    return Branch::updateBranch($id, $data);
  }

  public function destroy($id)
  {
    return Branch::destroyBranch($id);
  }
}
