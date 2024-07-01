<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
  use HasFactory;
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createSubject($requestData)
  {
    $subject = new Subject();
    $subject->user_id = Auth::id();
    $subject->name = $requestData["name"];
    $subject->status = $requestData["status"];
    $subject->save();
    return $subject;
  }

  public static function updateSubject($id, $requestData)
  {
    $subject = Subject::findOrFail($id);
    $subject->name = $requestData["name"];
    $subject->status = $requestData["status"];
    $subject->save();
    return $subject;
  }

  public static function destroySubject($id)
  {
    $subject = Subject::findOrFail($id);
    $subject->delete();
    return $subject;
  }
}
