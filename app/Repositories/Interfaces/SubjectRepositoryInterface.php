<?php

namespace App\Repositories\Interfaces;

interface SubjectRepositoryInterface
{
  public function getAll();

  public function getById(int $id);

  public function create(array $data);

  public function update(int $id, array $data);

  public function destroy(int $id);
}
