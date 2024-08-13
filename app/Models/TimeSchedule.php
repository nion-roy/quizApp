<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeSchedule extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public static function createTimeSchedule($requestData)
  {
    $timeSchedule = new TimeSchedule();
    $timeSchedule->user_id = Auth::id();
    $timeSchedule->start_class = $requestData["start_class"];
    $timeSchedule->end_class = $requestData["end_class"];
    $timeSchedule->status = $requestData["status"];
    $timeSchedule->save();
    return $timeSchedule;
  }

  public static function updateTimeSchedule($id, $requestData)
  {
    $timeSchedule = TimeSchedule::findOrFail($id);
    $timeSchedule->user_id = Auth::id();
    $timeSchedule->start_class = $requestData["start_class"];
    $timeSchedule->end_class = $requestData["end_class"];
    $timeSchedule->status = $requestData["status"];
    $timeSchedule->save();
    return $timeSchedule;
  }

  public static function destroyTimeSchedule($id)
  {
    $timeSchedule = TimeSchedule::findOrFail($id)->delete();
    return $timeSchedule;
  }
}
