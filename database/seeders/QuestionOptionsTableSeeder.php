<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionOptionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table("question_options")->insert([[
        'question_id' => 1,
        'option' => 'O(n)',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 1,
        'option' => 'O(log n)',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 1,
        'option' => 'O(n log n)',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 1,
        'option' => 'O(n^2)',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 2,
        'option' => 'MySQL',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 2,
        'option' => 'PostgreSQL',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 2,
        'option' => 'MongoDB',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 2,
        'option' => 'SQLite',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 3,
        'option' => 'Large Area Network',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 3,
        'option' => 'Local Area Network',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 3,
        'option' => 'Long Area Network',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 3,
        'option' => 'Light Area Network',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 4,
        'option' => 'Quick Sort',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 4,
        'option' => 'Bubble Sort',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 4,
        'option' => 'Merge Sort',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 4,
        'option' => 'Insertion Sort',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 5,
        'option' => 'To manage computer hardware',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 5,
        'option' => 'To provide an interface for user interaction',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 5,
        'option' => 'To manage software resources',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 5,
        'option' => 'All of the above',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 6,
        'option' => 'Queue',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 6,
        'option' => 'Stack',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 6,
        'option' => 'Array',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 6,
        'option' => 'Linked List',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 7,
        'option' => 'HyperText Transfer Protocol',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 7,
        'option' => 'HyperText Transmission Protocol',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 7,
        'option' => 'HyperText Transfer Program',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 7,
        'option' => 'HyperText Transmission Program',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 8,
        'option' => 'Encapsulation',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 8,
        'option' => 'Abstraction',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 8,
        'option' => 'Inheritance',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 8,
        'option' => 'All of the above',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 9,
        'option' => 'To store data',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 9,
        'option' => 'To perform arithmetic and logical operations',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 9,
        'option' => 'To control the flow of data',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 9,
        'option' => 'To interface with peripheral devices',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 10,
        'option' => 'my_variable',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 10,
        'option' => '2nd_variable',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 10,
        'option' => 'variable2',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'question_id' => 10,
        'option' => '_variable',
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],

    ]);
  }
}
