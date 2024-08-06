<?php

namespace App\Models;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
  use HasFactory;

  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public static function createTrainer($requestData)
  {
    $role = Role::where('id', $requestData['role'])->first();

    $user = new User();
    $user->branch_id = $requestData["branch"];
    $user->name = $requestData["name"];
    $user->username = Str::slug($user->name);
    $user->slug = Str::slug($user->name);
    $user->email = $requestData["email"];
    $user->status = $requestData["status"];
    $user->image = $requestData["image"] ?? 'user.png';
    $user->password = Hash::make('12345678');
    $user->role_id = $requestData['role'];
    $user->save();

    $user->syncRoles($role->name);

    $trainer = new Trainer();
    $trainer->user_id = $user->id;
    $trainer->designation = $requestData["designation"];
    $trainer->short_description = $requestData["short_description"];
    $trainer->marketplace = $requestData["marketplace"];
    $trainer->about = $requestData["about"];
    $trainer->freelancing_1 = $requestData["freelancing_1"];
    $trainer->freelancing_2 = $requestData["freelancing_2"];
    $trainer->freelancing_3 = $requestData["freelancing_3"];
    $trainer->save();
    return $trainer;
  }

  public static function updateTrainer($id, $requestData)
  {
    
    $role = Role::where('id', $requestData['role'])->first();
    
    $user = new User();
    $user->branch_id = $requestData["branch"];
    $user->name = $requestData["name"];
    $user->username = Str::slug($user->name);
    $user->slug = Str::slug($user->name);
    $user->email = $requestData["email"];
    $user->status = $requestData["status"];
    $user->image = $requestData["image"] ?? 'user.png';
    $user->password = Hash::make('12345678');
    $user->role_id = $requestData['role'];
    $user->save();
    
    $user->syncRoles($role->name);
    
    $trainer = Trainer::findOrFail($id);
    $trainer->user_id = $user->id;
    $trainer->designation = $requestData["designation"];
    $trainer->short_description = $requestData["short_description"];
    $trainer->marketplace = $requestData["marketplace"];
    $trainer->about = $requestData["about"];
    $trainer->freelancing_1 = $requestData["freelancing_1"];
    $trainer->freelancing_2 = $requestData["freelancing_2"];
    $trainer->freelancing_3 = $requestData["freelancing_3"];
    $trainer->save();
    return $trainer;
  }

  public static function destroyTrainer($id)
  {
    $trainer = Trainer::findOrFail($id);
    $trainer = User::where('id', $trainer->user_id)->delete();
    return $trainer;
  }
}
