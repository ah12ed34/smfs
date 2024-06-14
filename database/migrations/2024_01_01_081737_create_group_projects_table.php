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
        Schema::create('group_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->string('name');
            $table->decimal('grade',3,2)->nullable();
            $table->string('file')->nullable();
            $table->logText('comment')->nullable();
            $table->logText('comment_teacher')->nullable();
            // تاريخ التسليم
            $table->date('delivery_date')->nullable()->comment('تاريخ التسليم');
            $table->foreignId('student_id')->constrained('group_students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_projects');
    }
};
