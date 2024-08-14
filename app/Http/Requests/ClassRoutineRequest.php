<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRoutineRequest extends FormRequest
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
      'branch' => 'required',
      'department' => 'required',
      'batch' => 'required',
      'lab' => 'required',
      'trainer' => 'required',
      'day' => 'required',
      'time_schedule' => 'required'
    ];
  }
}
