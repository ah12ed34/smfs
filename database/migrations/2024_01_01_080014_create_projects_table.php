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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->longText("description")->nullable();
            $table->foreignId("subject_id")->constrained("group_subjects");
            $table->string('file')->nullable();
            $table->decimal('grade', 3, 2);
            $table->boolean("is_active")->default(true);
            $table->integer('max_students');
            $table->integer('min_students')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
