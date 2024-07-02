<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'subject_id' => ['required'],
      'department_id' => ['required'],
      'question_name' => ['required', Rule::unique('questions')->ignore($this->route('question'))],
      'option.*' => 'required',
      'correct_answer' => ['required'],
      'status' => ['required'],
    ];
  }

  public function messages()
  {
    return [
      'option.*.required' => 'The option field is required.',
    ];
  }
}
