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
        Schema::create('project_chats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("Group_id")->constrained("group_projects");
            $table->foreignId('student_id')->constrained('work_groups','student_id');
            $table->longText("message");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_groups');
    }
};
