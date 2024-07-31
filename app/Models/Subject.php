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

  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public static function createSubject($requestData)
  {
    $subject = new Subject();
    $subject->user_id = Auth::id();
    $subject->department_id = $requestData["department"];
    $subject->subject_name = $requestData["subject_name"];
    $subject->status = $requestData["status"];
    $subject->save();
    return $subject;
  }

  public static function updateSubject($id, $requestData)
  {
    $subject = Subject::findOrFail($id);
    $subject->department_id = $requestData["department"];
    $subject->subject_name = $requestData["subject_name"];
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
