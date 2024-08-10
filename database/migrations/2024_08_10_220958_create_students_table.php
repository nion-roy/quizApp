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
    Schema::create('students', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->string('designation');
      $table->text('short_description')->nullable();
      $table->text('marketplace')->nullable();
      $table->text('about')->nullable();
      $table->mediumText('freelancing_1')->nullable();
      $table->mediumText('freelancing_2')->nullable();
      $table->mediumText('freelancing_3')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('students');
  }
};
