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
      $table->foreignId('batch_id')->constrained('batches');
      $table->string('group_name');
      $table->integer('nid_no')->nullable();
      $table->string('birth_date')->nullable();
      $table->string('gender')->nullable();
      $table->string('blood_group')->nullable();
      $table->string('computer_skill')->nullable();
      $table->string('profession')->nullable();
      $table->string('religion')->nullable();
      $table->string('disabilities')->nullable();
      $table->string('present_address')->nullable();
      $table->string('permanent_address')->nullable();
      $table->string('education_qualification')->nullable();
      $table->string('pass_year')->nullable();
      $table->string('father_name')->nullable();
      $table->string('father_number')->nullable();
      $table->string('mother_name')->nullable();
      $table->string('mother_number')->nullable();
      $table->text('about')->nullable();
      $table->text('marketplace')->nullable();
      $table->string('linked_in')->nullable();
      $table->string('upwork')->nullable();
      $table->string('fiver')->nullable();
      $table->string('link_three')->nullable();
      $table->string('link_four')->nullable();
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
