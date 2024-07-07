<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table("users")->insert([
      [
        'name'    => 'Super Admin',
        'slug' => 'superadmin',
        'username' => 'superadmin',
        'email'   => 'superadmin@gmail.com',
        'role'  => 'super-admin',
        'status'  => 1,
        'image'  => 'user.png',
        'password'  => Hash::make('12345678'),
        'expire'  => '01-01-2026',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'    => 'Admin',
        'slug' => 'admin',
        'username' => 'admin',
        'email'   => 'admin@gmail.com',
        'role'  => 'admin',
        'status'  => 1,
        'image'  => 'user.png',
        'password'  => Hash::make('12345678'),
        'expire'  => '01-01-2026',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'name'    => 'User',
        'slug' => 'user',
        'username' => 'user',
        'email'   => 'user@gmail.com',
        'role'  => 'user',
        'status'  => 1,
        'image'  => 'user.png',
        'password'  => Hash::make('12345678'),
        'expire'  => '01-01-2026',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ]
    ]);
  }
}
