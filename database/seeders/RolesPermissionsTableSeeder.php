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
    Permission::create(['name' => 'view permission']);
    Permission::create(['name' => 'create permission']);
    Permission::create(['name' => 'update permission']);
    Permission::create(['name' => 'delete permission']);

    // Create User Permissions
    Permission::create(['name' => 'view user']);
    Permission::create(['name' => 'create user']);
    Permission::create(['name' => 'update user']);
    Permission::create(['name' => 'delete user']);

    // Create Department Permissions
    Permission::create(['name' => 'view department']);
    Permission::create(['name' => 'create department']);
    Permission::create(['name' => 'update department']);
    Permission::create(['name' => 'delete department']);

    // Create Subject Permissions
    Permission::create(['name' => 'view subject']);
    Permission::create(['name' => 'create subject']);
    Permission::create(['name' => 'update subject']);
    Permission::create(['name' => 'delete subject']);


    // Create Clear Cache Permissions
    Permission::create(['name' => 'clear cache']);

    // Create Roles
    $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
    $adminRole = Role::create(['name' => 'admin']);
    $teacherRole = Role::create(['name' => 'teacher']);
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


    $teacherUser = User::firstOrCreate([
      'email' => 'teacher@gmail.com',
    ], [
      'name' => 'Teacher',
      'slug' => 'teacher',
      'username' => 'teacher',
      'role_id' => 3,
      'status' => 1,
      'email' => 'teacher@gmail.com',
      'password' => Hash::make('12345678'),
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ]);

    $teacherUser->assignRole($teacherRole);

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
