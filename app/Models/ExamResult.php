<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
  use HasFactory;

  public function exam()
  {
    return $this->belongsTo(Exam::class);
  }

  public function question()
  {
    return $this->belongsTo(Question::class);
  }

  public function option()
  {
    return $this->belongsTo(QuestionOption::class);
  }
}
