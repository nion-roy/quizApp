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
    Schema::create('departments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('branch_id')->constrained('branches')->cascadeOnDelete();
      $table->foreignId('user_id')->constrained('users');
      $table->string('department_name')->unique();
      $table->string('slug')->unique();
      $table->boolean('status')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('departments');
  }
};
