<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('departments')->insert([
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_name' => 'DYD Project',
        'slug' => 'dyd-project',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_name' => 'SDF Project',
        'slug' => 'sdf-project',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_name' => 'Web Design & Development',
        'slug' => 'web-design-&-development',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_name' => 'Networking',
        'slug' => 'networking',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_name' => 'Hardware',
        'slug' => 'hardware',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
    ]);
  }
}
