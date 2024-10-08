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
    Schema::create('class_routines', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
      $table->foreignId('department_id')->constrained('departments')->cascadeOnDelete();
      $table->foreignId('batch_id')->constrained('batches')->cascadeOnDelete();
      $table->foreignId('lab_id')->constrained('labs')->cascadeOnDelete();
      $table->foreignId('trainer_id')->constrained('trainers')->cascadeOnDelete();
      $table->string('day');
      $table->foreignId('time_schedule_id')->constrained('time_schedules')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('class_routines');
  }
};
