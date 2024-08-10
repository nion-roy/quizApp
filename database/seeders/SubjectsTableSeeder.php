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
        'department_id' => 3,
        'subject_name' => 'HTML',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'CSS',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'JavaScript',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'jQuery',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'Bootstrap',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'PHP',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'MySQL',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'Python',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'Mongo DB',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'React',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_name' => 'Laravel',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
    ]);
  }
}
