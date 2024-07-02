<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
      'department_id' => ['required'],
      'subject_name' => ['required', 'string', Rule::unique('subjects')->ignore($this->route('subject'))],
      'status' => ['required'],
    ];
  }
  public function messages(): array
  {
    return [
      'department_id.required' => ['The department field is required.'],
    ];
  }
}
