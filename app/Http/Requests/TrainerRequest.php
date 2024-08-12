<?php

namespace App\Http\Requests;

use App\Models\Trainer;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
      $trainer = Trainer::findOrFail($id);
      $userId = $trainer->user_id;
    } else {
      $userId = null;
    }

    return [
      'branch' => ['required'],
      'name' => ['required'],
      'slug' => ['nullable'],
      'designation' => ['required'],
      'email' => ['required', Rule::unique('users')->ignore($userId)],
      'number' => ['nullable', 'regex:/^(\+8801|01)[3-9]\d{8}$/', Rule::unique('users')->ignore($userId)],
      'about' => ['nullable'],
      'short_description' => ['nullable'],
      'marketplace' => ['nullable'],
      'fiverr' => ['nullable'],
      'upwork' => ['nullable'],
      'freelancer' => ['nullable'],
      'linkedin' => ['nullable'],
      'status' => ['required'],
      'image' => ['nullable'],
      'role' => ['nullable'],
    ];
  }
}
