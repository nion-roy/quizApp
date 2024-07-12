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
    Schema::create('m_c_q_test_results', function (Blueprint $table) {
      $table->id();
      $table->foreignId('mcq_test_id')->constrained('m_c_q_tests')->cascadeOnDelete();
      $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
      $table->foreignId('option_id')->nullable()->constrained('question_options')->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('m_c_q_test_results');
  }
};
