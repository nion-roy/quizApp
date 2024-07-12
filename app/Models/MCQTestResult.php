<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQTestResult extends Model
{
  use HasFactory;

  public function mcqTest()
  {
    return $this->belongsTo(MCQTest::class);
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
