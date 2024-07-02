<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('subjects')->insert([
      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Bangla',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'English',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Physics',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Chemistry',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Biology',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Agriculture Education',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'ICT',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Agriculture Education',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Geography',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Psychology',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Accounting',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Economics',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Production Management & Marketing',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'Business Organization and Management',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => rand(1,5),
        'subject_name' => 'History',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
    ]);
  }
}
