<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoutine extends Model
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



  public static function createClassRoutine($requestData)
  {
    $classRoutine = new ClassRoutine();
    $classRoutine->user_id = Auth::id();
    $classRoutine->branch_id = $requestData["branch"];
    $classRoutine->department_id = $requestData["department"];
    $classRoutine->batch_id = $requestData["batch"];
    $classRoutine->lab_id = $requestData["lab"];
    $classRoutine->trainer_id = $requestData["trainer"];
    $classRoutine->day = $requestData["day"];
    $classRoutine->time_schedule_id = $requestData["time_schedule"];
    $classRoutine->save();
    return $classRoutine;
  }



  public static function updateClassRoutine($id, $requestData)
  {
    $classRoutine = ClassRoutine::findOrFail($id);
    $classRoutine->branch_id = $requestData["branch"];
    $classRoutine->department_id = $requestData["department"];
    $classRoutine->batch_id = $requestData["batch"];
    $classRoutine->lab_id = $requestData["lab"];
    $classRoutine->trainer_id = $requestData["trainer"];
    $classRoutine->day = $requestData["day"];
    $classRoutine->time_schedule_id = $requestData["time_schedule"];
    $classRoutine->save();
    return $classRoutine;
  }


  public static function destroyClassRoutine($id)
  {
    $classRoutine = ClassRoutine::findOrFail($id);
    $classRoutine->delete();
    return $classRoutine;
  }
}
