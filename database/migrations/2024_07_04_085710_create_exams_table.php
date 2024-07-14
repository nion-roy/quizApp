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
    Schema::create('exams', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
      $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
      $table->string('exam_name')->unique();
      $table->string('slug')->unique();
      $table->string('exam_start');
      $table->string('exam_end');
      $table->string('exam_mark');
      $table->string('question_type');
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('exams');
  }
};
