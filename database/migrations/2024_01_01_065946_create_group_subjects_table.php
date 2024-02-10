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
        Schema::create('group_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId("group_id")->constrained("groups");
            $table->string("subject_id"); // نفس النوع كما في جدول subjects_levels
            $table->foreign('subject_id')->references('subject_id')->on('subjects_levels');
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('level_id')->on('subjects_levels');
            $table->foreignId("teacher_id")->constrained("academics", "user_id");
            $table->boolean('is_practical')->default(false);
            $table->timestamps();
            $table->unique(['group_id', 'subject_id', 'level_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_subjects');
    }
};
