<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function options()
  {
    return $this->hasMany(QuestionOption::class);
  }

  public function exam()
  {
    return $this->belongsToMany(Exam::class, ExamQuestion::class);
  }

  public function examResults()
  {
    return $this->belongsToMany(Exam::class, ExamResult::class);
  }

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
    $question->question_name = $requestData["question_name"];
    $question->correct_answer = $requestData["correct_answer"];
    $question->status = $requestData["status"];
    $question->save();

    // Create associated QuestionOption
    foreach ($requestData["option"] as $option) {
      $questionOption = new QuestionOption();
      $questionOption->question_id = $question->id;
      $questionOption->option = $option;
      $questionOption->save();
    }

    // Return both Question and QuestionOption
    return [$question, $questionOption];
  }


  public static function updateQuestion($id, $requestData)
  {
    // Update a Question
    $question = Question::findOrFail($id);
    $question->user_id = Auth::id();
    $question->subject_id = $requestData["subject_id"];
    $question->department_id = $requestData["department_id"];
    $question->question_name = $requestData["question_name"];
    $question->correct_answer = $requestData["correct_answer"];
    $question->status = $requestData["status"];
    $question->save();

    QuestionOption::where('question_id', $id)->delete();

    // Update associated QuestionOption
    foreach ($requestData["option"] as $option) {
      $questionOption = new QuestionOption();
      $questionOption->question_id = $question->id;
      $questionOption->option = $option;
      $questionOption->save();
    }

    // Return both Question and QuestionOption
    return [$question, $questionOption];
  }

  public static function destroyQuestion($id)
  {
    $question = Question::findOrFail($id);
    $question->delete();
    return $question;
  }
}
