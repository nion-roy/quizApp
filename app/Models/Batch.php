<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }


  public function department()
  {
    return $this->belongsTo(Department::class);
  }


  public function lab()
  {
    return $this->belongsTo(Lab::class);
  }


  public static function createBatch($requestData)
  {
    $batch = new Batch();
    $batch->branch_id = $requestData["branch"];
    $batch->department_id = $requestData["department"];
    $batch->batch = $requestData["batch"];
    $batch->status = $requestData["status"];
    $batch->save();
    return $batch;
  }

  public static function updateBatch($id, $requestData)
  {
    $batch = Batch::findOrFail($id);
    $batch->branch_id = $requestData["branch"];
    $batch->department_id = $requestData["department"];
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
