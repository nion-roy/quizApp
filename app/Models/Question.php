<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function subject()
  {
    return $this->belongsTo(Subject::class);
  }

  public function department()
  {
    return $this->belongsTo(Department::class);
  }

  public static function createQuestion($requestData)
  {
    // Create a new Question
    $question = new Question();
    $question->user_id = Auth::id();
    $question->subject_id = $requestData["subject_id"];
    $question->department_id = $requestData["department_id"];
    $question->question = $requestData["question"];
    $question->correct_answer = $requestData["correct_answer"];
    $question->status = $requestData["status"];
    $question->save();

    // Create associated QuestionOption
    $questionOption = new QuestionOption();
    $questionOption->user_id = Auth::id();
    $questionOption->subject_id = $requestData["subject_id"];
    $questionOption->department_id = $requestData["department_id"];
    $questionOption->question_id = $question->id;
    $questionOption->option_1 = $requestData["option_1"];
    $questionOption->option_2 = $requestData["option_2"];
    $questionOption->option_3 = $requestData["option_3"];
    $questionOption->option_4 = $requestData["option_4"];
    $questionOption->save();

    // Return both Question and QuestionOption
    return [$question, $questionOption];
  }


  public static function updateQuestion($id, $requestData)
  {
    $question = Question::findOrFail($id);
    $question->question_name = $requestData["question_name"];
    $question->status = $requestData["status"];
    $question->save();
    return $question;
  }

  public static function destroyQuestion($id)
  {
    $question = Question::findOrFail($id);
    $question->delete();
    return $question;
  }
}
