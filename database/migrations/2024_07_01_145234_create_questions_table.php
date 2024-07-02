<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('questions', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
      $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
      $table->string('question_name')->unique();
      $table->string('correct_answer');
      $table->boolean('status')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('questions');
  }
};
