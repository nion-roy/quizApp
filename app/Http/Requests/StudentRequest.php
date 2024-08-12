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
      $userId = $student->user_id;
    } else {
      $userId = null;
    }

    return [
      'branch' => ['required'],
      'batch' => ['required'],
      'group_name' => ['required'],
      'student_name' => ['required'],
      'number' => ['required', 'numeric','regex:/^(\+8801|01)[3-9]\d{8}$/', Rule::unique('users')->ignore($userId)],
      'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
      'nid_no' => ['required', 'numeric'],
      'birth_date' => ['required'],
      'gender' => ['required'],
      'blood_group' => ['required'],
      'computer_skill' => ['required'],
      'profession' => ['required'],
      'religion' => ['required'],
      'disabilities' => ['required'],
      'present_address' => ['required'],
      'permanent_address' => ['required'],
      'education_qualification' => ['required'],
      'pass_year' => ['required'],
      'father_name' => ['required'],
      'father_number' => ['required'],
      'mother_name' => ['required'],
      'mother_number' => ['required'],
      'about' => ['nullable'],
      'marketplace' => ['nullable'],
      'linked_in' => ['nullable'],
      'upwork' => ['nullable'],
      'fiver' => ['nullable'],
      'link_three' => ['nullable'],
      'link_four' => ['nullable'],
      'status' => ['required'],
      'role' => ['required'],
      'image' => ['nullable'],
    ];
  }
}
