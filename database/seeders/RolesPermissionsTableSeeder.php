<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RolesPermissionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Create Role Permissions
    Permission::create(['name' => 'view role']);
    Permission::create(['name' => 'create role']);
    Permission::create(['name' => 'update role']);
    Permission::create(['name' => 'delete role']);

    // Create User Permissions
    Permission::create(['name' => 'view user']);
    Permission::create(['name' => 'create user']);
    Permission::create(['name' => 'update user']);
    Permission::create(['name' => 'delete user']);

    // Create Roles
    $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
    $adminRole = Role::create(['name' => 'admin']);
    $staffRole = Role::create(['name' => 'staff']);
    $userRole = Role::create(['name' => 'user']);

    // Lets give all permission to super-admin role.
    $allPermissionNames = Permission::pluck('name')->toArray();

    $superAdminRole->givePermissionTo($allPermissionNames);

    // Let's Create User and assign Role to it.
    $superAdminUser = User::firstOrCreate([
      'email' => 'superadmin@gmail.com',
    ], [
      'name' => 'Super Admin',
      'slug' => 'super-admin',
      'username' => 'superadmin',
      'role_id' => 1,
      'status' => 1,
      'email' => 'superadmin@gmail.com',
      'password' => Hash::make('12345678'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $superAdminUser->assignRole($superAdminRole);


    $adminUser = User::firstOrCreate([
      'email' => 'admin@gmail.com'
    ], [
      'name' => 'Admin',
      'slug' => 'admin',
      'username' => 'admin',
      'role_id' => 2,
      'status' => 1,
      'email' => 'admin@gmail.com',
      'password' => Hash::make('12345678'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $adminUser->assignRole($adminRole);


    $staffUser = User::firstOrCreate([
      'email' => 'staff@gmail.com',
    ], [
      'name' => 'Staff',
      'slug' => 'staff',
      'username' => 'staff',
      'role_id' => 3,
      'status' => 1,
      'email' => 'staff@gmail.com',
      'password' => Hash::make('12345678'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $staffUser->assignRole($staffRole);

    $userUser = User::firstOrCreate([
      'email' => 'user@gmail.com',
    ], [
      'name' => 'User',
      'slug' => 'user',
      'username' => 'user',
      'role_id' => 4,
      'status' => 1,
      'email' => 'user@gmail.com',
      'password' => Hash::make('12345678'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $userUser->assignRole($userRole);
  }
}
