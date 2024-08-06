<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function branch()
  {
    return $this->belongsTo(Branch::class);
  }

  public static function createDepartment($requestData)
  {
    $department = new Department();
    $department->user_id = Auth::id();
    $department->department_name = $requestData["department_name"];
    $department->status = $requestData["status"];
    $department->save();
    return $department;
  }

  public static function updateDepartment($id, $requestData)
  {
    $department = Department::findOrFail($id);
    $department->department_name = $requestData["department_name"];
    $department->status = $requestData["status"];
    $department->save();
    return $department;
  }

  public static function destroyDepartment($id)
  {
    $department = Department::findOrFail($id);
    $department->delete();
    return $department;
  }
}
