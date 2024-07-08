<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  { 
    $this->call(RolesPermissionsTableSeeder::class);
    $this->call(DepartmentsTableSeeder::class);
    $this->call(SubjectsTableSeeder::class);
  }
}
