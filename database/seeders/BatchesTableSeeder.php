<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BatchesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('batches')->insert([
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_id' => 1,
        'batch' => 'Batch 01',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_id' => 1,
        'batch' => 'Batch 02',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_id' => 1,
        'batch' => 'Batch 03',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_id' => 1,
        'batch' => 'Batch 04',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ],
      [
        'user_id' => 1,
        'branch_id' => 1,
        'department_id' => 1,
        'batch' => 'Batch 05',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now()
      ]
    ]);
  }
}
