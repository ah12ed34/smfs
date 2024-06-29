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
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId("department_id")->constrained("departments");
            $table->foreignId("level_id")->constrained("levels");
            $table->boolean("is_active")->default(true);
            $table->enum('system', ['general', 'parallel']);
            $table->year('join_year')->nullable();
            $table->boolean("is_graduated")->default(false);
            $table->boolean("is_suspended")->default(false);
            $table->timestamps();
            $table->primary('user_id');
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
