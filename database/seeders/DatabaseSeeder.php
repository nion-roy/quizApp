<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // $this->call(UsersTableSeeder::class);
    $this->call(RolesPermissionsTableSeeder::class);
    $this->call(DepartmentsTableSeeder::class);
    $this->call(SubjectsTableSeeder::class);
    $this->call(QuestionsTableSeeder::class);
    $this->call(QuestionOptionsTableSeeder::class);
  }
}
