<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routine extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }


  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public function batch()
  {
    return $this->belongsTo(Batch::class);
  }

  public function lab()
  {
    return $this->belongsTo(Lab::class);
  }

  public function trainer()
  {
    return $this->belongsTo(Trainer::class);
  }

  public function timeSchedule()
  {
    return $this->belongsTo(TimeSchedule::class);
  }


  public static function createRoutine($requestData)
  {
    $routine = new Routine();
    $routine->user_id = Auth::id();
    $routine->branch_id = $requestData["branch"];
    $routine->department_id = $requestData["department"];
    $routine->batch_id = $requestData["batch"];
    $routine->lab_id = $requestData["lab"];
    $routine->trainer_id = $requestData["trainer"];
    $routine->day = $requestData["day"];
    $routine->time_schedule_id = $requestData["time_schedule"];
    $routine->save();
    return $routine;
  }

  public static function updateRoutine($id, $requestData)
  {
    $routine = Routine::findOrFail($id);
    $routine->branch_id = $requestData["branch"];
    $routine->department_id = $requestData["department"];
    $routine->batch_id = $requestData["batch"];
    $routine->lab_id = $requestData["lab"];
    $routine->trainer_id = $requestData["trainer"];
    $routine->day = $requestData["day"];
    $routine->time_schedule_id = $requestData["time_schedule"];
    $routine->save();
    return $routine;
  }

  public static function destroyRoutine($id)
  {
    $routine = Routine::findOrFail($id)->delete();
    return $routine;
  }
}
