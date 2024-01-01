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
        Schema::create('group_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained("students",'user_id');
            $table->foreignId("group_id")->constrained("groups");
            $table->unique(["student_id", "group_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_students');
    }
};
