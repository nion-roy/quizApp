<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
    $id = request()->segment(3);
    if (isset($id)) {
      $student = Student::findOrFail($id);
    }

    return [
      'branch' => ['required'],
      'batch' => ['required'],
      'group_name' => ['required'],
      'student_name' => ['required'],
      'number' => ['required', 'numeric'],
      'email' => ['required', 'email', isset($student) ? 'unique:users,email,' . $student->user_id : 'unique:users,email'],
      'nid_no' => ['nullable', 'numeric'],
      'birth_date' => ['nullable'],
      'gender' => ['required'],
      'blood_group' => ['required'],
      'computer_skill' => ['required'],
      'profession' => ['required'],
      'religion' => ['nullable'],
      'disabilities' => ['nullable'],
      'present_address' => ['nullable'],
      'permanent_address' => ['nullable'],
      'education_qualification' => ['nullable'],
      'pass_year' => ['nullable'],
      'father_name' => ['nullable'],
      'father_number' => ['nullable'],
      'mother_name' => ['nullable'],
      'mother_number' => ['nullable'],
      'about' => ['nullable'],
      'marketplace' => ['nullable'],
      'linked_in' => ['nullable'],
      'upwork' => ['nullable'],
      'fiver' => ['nullable'],
      'link_three' => ['nullable'],
      'link_four' => ['nullable'],
      'status' => ['required'],
      'role' => ['nullable'],
      'image' => ['nullable'],
    ];
  }
}
