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
        Schema::create('academics', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId("department_id")->constrained("departments")->nullable();
            $table->string('status')->nullable();
            $table->string('academic_name')->nullable();
            $table->string('schedule')->nullable();
            $table->integer('Weekly_lectures')->nullable();
            $table->integer('Quarterly_lectures')->nullable();
            $table->primary('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
