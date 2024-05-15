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
        Schema::create('group_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_subject_id')->constrained('group_subjects');
            $table->foreignId('file_id')->constrained('files');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('is_active')->default(true);
            // Determine the highest reaches 100.00 and the lowest 1.00 value
            $table->decimal('grade', 5, 2)->nullable()->Min(1.00)->Max(100.00);
            $table->date('due_date')->nullable();
            $table->unique(['group_subject_id', 'file_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_files');
    }
};
