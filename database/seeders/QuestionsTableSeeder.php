<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('questions')->insert([
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'What is the time complexity of binary search?',
        'correct_answer' => 'O(log n)',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'Which of the following is a non-relational database?',
        'correct_answer' => 'MongoDB',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'In computer networks, what does the acronym "LAN" stand for?',
        'correct_answer' => 'Local Area Network',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'Which sorting algorithm has the best average-case time complexity?',
        'correct_answer' => 'Merge Sort',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'What is the main purpose of an operating system?',
        'correct_answer' => 'All of the above',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'Which data structure is used for implementing recursion?',
        'correct_answer' => 'Stack',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'What does HTTP stand for?',
        'correct_answer' => 'HyperText Transfer Protocol',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'Which of the following is a principle of OOP (Object-Oriented Programming)?',
        'correct_answer' => 'All of the above',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'What is the primary function of the ALU (Arithmetic Logic Unit)?',
        'correct_answer' => 'To perform arithmetic and logical operations',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ],
      [
        'user_id' => 1,
        'department_id' => 3,
        'subject_id' => 1,
        'question_name' => 'Which of the following is not a valid variable name in Python?',
        'correct_answer' => '2nd_variable',
        'status' => 1,
        'created_at'  => Carbon::now(),
        'updated_at'  => Carbon::now(),
      ]

    ]);
  }
}
