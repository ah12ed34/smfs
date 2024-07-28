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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('group_subjects')->onDelete('cascade')
                ->nullable();
            $table->foreignId('ay_id')->constrained('academic_years')->onDelete('cascade');
            $table->enum('sender_type', ['teacher', 'admin']);
            // Targeted
            $table->enum('target', ['student', 'teacher', 'headOfDepartment', 'employee']);
            // message
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
