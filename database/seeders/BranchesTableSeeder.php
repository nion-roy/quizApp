<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('branches')->insert([
      [
        'user_id' => 1,
        'branch_name' => 'Barishal',
        'slug' => 'barishal',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Chattogram',
        'slug' => 'chattogram',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Dhaka',
        'slug' => 'dhaka',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Khulna',
        'slug' => 'khulna',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Rajshahi',
        'slug' => 'rajshahi',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Rangpur',
        'slug' => 'rangpur',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Mymensingh',
        'slug' => 'mymensingh',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],

      [
        'user_id' => 1,
        'branch_name' => 'Sylhet',
        'slug' => 'sylhet',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
    ]);
  }
}
