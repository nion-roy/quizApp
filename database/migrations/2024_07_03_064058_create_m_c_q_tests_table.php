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
    Schema::create('m_c_q_tests', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
      $table->string('total_time')->nullable();
      $table->string('use_time')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('m_c_q_tests');
  }
};
