<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return false;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'branch_id' => ['nullable'],
      'name' => ['required'],
      'username' => ['nullable'],
      'slug' => ['nullable'],
      'number' => ['required', 'regex:/^(\+8801|01)[3-9]\d{8}$/'],
      'email' => ['required', Rule::unique('users')->ignore($this->route('user'))],
      'otp' => ['nullable'],
      'password' => ['nullable'],
      'address' => ['nullable'],
    ];
  }
}
