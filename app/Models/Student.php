<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public static function createStudent($requestData)
  {
    $role = Role::where('id', $requestData['role'])->first();

    $user = new User();
    $user->branch_id = $requestData["branch"];
    $user->name = $requestData["student_name"];
    $user->username = Str::slug($user->name);
    $user->slug = Str::slug($user->name);
    $user->email = $requestData["email"];
    $user->number = $requestData["number"];
    $user->status = $requestData["status"];
    $user->image = $requestData["image"] ?? 'user.png';
    $user->password = Hash::make('12345678');
    $user->role_id = $requestData['role'];
    $user->save();

    $user->syncRoles($role->name);

    $student = new Student();
    $student->user_id = $user->id;
    $student->batch_id = $requestData["batch"];
    $student->group_name = $requestData["group_name"];
    $student->nid_no = $requestData["nid_no"];
    $student->birth_date = $requestData["birth_date"];
    $student->gender = $requestData["gender"];
    $student->blood_group = $requestData["blood_group"];
    $student->computer_skill = $requestData["computer_skill"];
    $student->profession = $requestData["profession"];
    $student->religion = $requestData["religion"];
    $student->disabilities = $requestData["disabilities"];
    $student->present_address = $requestData["present_address"];
    $student->permanent_address = $requestData["permanent_address"];
    $student->education_qualification = $requestData["education_qualification"];
    $student->pass_year = $requestData["pass_year"];
    $student->father_name = $requestData["father_name"];
    $student->father_number = $requestData["father_number"];
    $student->mother_name = $requestData["mother_name"];
    $student->mother_number = $requestData["mother_number"];
    $student->about = $requestData["about"];
    $student->marketplace = $requestData["marketplace"];
    $student->linked_in = $requestData["linked_in"];
    $student->upwork = $requestData["upwork"];
    $student->fiver = $requestData["fiver"];
    $student->link_three = $requestData["link_three"];
    $student->link_four = $requestData["link_four"];
    $student->save();
    return $student;
  }



  public static function updateStudent($id, $requestData)
  {
    $role = Role::where('id', $requestData['role'])->first();

    $student = Student::findOrFail($id);

    $user = User::findOrFail($student->user_id);
    $user->branch_id = $requestData["branch"];
    $user->name = $requestData["student_name"];
    $user->username = Str::slug($user->name);
    $user->slug = Str::slug($user->name);
    $user->email = $requestData["email"];
    $user->number = $requestData["number"];
    $user->status = $requestData["status"];
    $user->image = $requestData["image"] ?? 'user.png';
    $user->password = Hash::make('12345678');
    $user->role_id = $requestData['role'];
    $user->save();

    $user->syncRoles($role->name);

    $student->batch_id = $requestData["batch"];
    $student->group_name = $requestData["group_name"];
    $student->nid_no = $requestData["nid_no"];
    $student->birth_date = $requestData["birth_date"];
    $student->gender = $requestData["gender"];
    $student->blood_group = $requestData["blood_group"];
    $student->computer_skill = $requestData["computer_skill"];
    $student->profession = $requestData["profession"];
    $student->religion = $requestData["religion"];
    $student->disabilities = $requestData["disabilities"];
    $student->present_address = $requestData["present_address"];
    $student->permanent_address = $requestData["permanent_address"];
    $student->education_qualification = $requestData["education_qualification"];
    $student->pass_year = $requestData["pass_year"];
    $student->father_name = $requestData["father_name"];
    $student->father_number = $requestData["father_number"];
    $student->mother_name = $requestData["mother_name"];
    $student->mother_number = $requestData["mother_number"];
    $student->about = $requestData["about"];
    $student->marketplace = $requestData["marketplace"];
    $student->linked_in = $requestData["linked_in"];
    $student->upwork = $requestData["upwork"];
    $student->fiver = $requestData["fiver"];
    $student->link_three = $requestData["link_three"];
    $student->link_four = $requestData["link_four"];
    $student->save();
    return $student;
  }


  public static function destroyStudent($id)
  {
    $student = Student::findOrFail($id);
    $student = User::where('id', $student->user_id)->delete();
    return $student;
  }
}
