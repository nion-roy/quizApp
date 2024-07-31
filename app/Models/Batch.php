<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  use HasFactory;

  protected $guarded = [];

  public static function createBatch($requestData)
  {
    $batch = new Batch();
    $batch->batch = $requestData["batch"];
    $batch->status = $requestData["status"];
    $batch->save();
    return $batch;
  }

  public static function updateBatch($id, $requestData)
  {
    $batch = Batch::findOrFail($id);
    $batch->batch = $requestData["batch"];
    $batch->status = $requestData["status"];
    $batch->save();
    return $batch;
  }

  public static function destroyBatch($id)
  {
    $batch = Batch::findOrFail($id);
    $batch->delete();
    return $batch;
  }
}
