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
        Schema::create('work_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("group_id")->constrained("group_projects");
            $table->foreignId("student_id")->constrained("group_students");
            $table->unique(["group_id", "student_id"]);
            $table->longText('description')->nullable();
            $table->decimal('grade', 3, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_groups');
    }
};
