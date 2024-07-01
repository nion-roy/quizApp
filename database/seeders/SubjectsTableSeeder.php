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
        'name' => 'Bangla',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'English',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Physics',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Chemistry',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Biology',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Agriculture Education',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'ICT',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Agriculture Education',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Geography',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Psychology',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Accounting',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Economics',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Production Management & Marketing',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'Business Organization and Management',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

      [
        'user_id' => 1,
        'name' => 'History',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
    ]);
  }
}
