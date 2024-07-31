<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  use HasFactory;

  protected $guarded = [];

  public static function createBranch($requestData)
  {
    $branch = new Branch();
    $branch->branch = $requestData["branch"];
    $branch->status = $requestData["status"];
    $branch->save();
    return $branch;
  }

  public static function updateBranch($id, $requestData)
  {
    $branch = Branch::findOrFail($id);
    $branch->branch = $requestData["branch"];
    $branch->status = $requestData["status"];
    $branch->save();
    return $branch;
  }

  public static function destroyBranch($id)
  {
    $branch = Branch::findOrFail($id);
    $branch->delete();
    return $branch;
  }
}
