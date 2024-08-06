<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LabsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('labs')->insert([
      [
        'user_id' => 1,
        'branch_id' => 1,
        'lab_name' => 'lab 01',
        'min_set' => 10,
        'max_set' => 10,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'lab_name' => 'lab 02',
        'min_set' => 10,
        'max_set' => 10,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'lab_name' => 'lab 03',
        'min_set' => 10,
        'max_set' => 10,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'lab_name' => 'lab 04',
        'min_set' => 10,
        'max_set' => 10,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
    ]);
  }
}
