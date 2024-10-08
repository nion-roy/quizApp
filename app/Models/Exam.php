<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function question()
  {
    return $this->belongsToMany(Question::class, ExamQuestion::class);
  }

  public function examAnswer()
  {
    return $this->hasMany(ExamResult::class);
  }

  public function examResults()
  {
    return $this->hasMany(ExamResult::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public function subject()
  {
    return $this->belongsTo(Subject::class);
  }
}
