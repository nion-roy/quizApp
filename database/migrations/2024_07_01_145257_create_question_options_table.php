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
    Schema::create('question_options', function (Blueprint $table) {
      $table->id();
      $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
      $table->string('option');
      // $table->string('option_2');
      // $table->string('option_3');
      // $table->string('option_4');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('question_options');
  }
};
