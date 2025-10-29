<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void {
    Schema::create('enrollments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
        $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
        $table->timestamp('enrolled_at')->nullable();
        $table->string('semester', 10)->nullable(); // ex: 2025G
        $table->timestamps();

        $table->unique(['student_id','course_id']);
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
