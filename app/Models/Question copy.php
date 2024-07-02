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
    $question->department_id = $requestData["department_id"];
    $question->subject_id = $requestData["subject_id"];
    $question->exam_name = $requestData["exam_name"];
    $question->exam_date = $requestData["exam_date"];
    $question->exam_duration = $requestData["exam_duration"];
    $question->status = $requestData["status"];
    $question->save();


    foreach ($requestData["question_name"] as $index => $name) {
      // Create associated QuestionOption
      $questionOption = new QuestionOption();
      $questionOption->user_id = Auth::id();
      $questionOption->question_id = $question->id;
      $questionOption->question_name = $name;
      $questionOption->option_1 = $requestData["option_1"][$index];
      $questionOption->option_2 = $requestData["option_2"][$index];
      $questionOption->option_3 = $requestData["option_3"][$index];
      $questionOption->option_4 = $requestData["option_4"][$index];
      $questionOption->correct_answer = $requestData["correct_answer"][$index];
      $questionOption->save();
    }

    // Return both Question and QuestionOption
    return $question;
    // return [$question, $questionOption];
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
