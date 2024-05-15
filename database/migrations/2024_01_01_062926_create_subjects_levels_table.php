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
        // Schema::create('subjects_levels', function (Blueprint $table) {
        //     $table->foreign('subject_id')->constrained('subjects','id');
        //     $table->foreign('level_id')->constrained('levels','id');
        //     $table->integer('semester')->default(1);
        //     $table->boolean('has_practical')->default(false);
        //     $table->boolean('isActivated')->default(true);
        //     $table->timestamps();
        //     $table->primary(['subject_id','level_id']);
        // });


    Schema::create('subjects_levels', function (Blueprint $table) {
        $table->id();
        $table->string('subject_id');
        $table->foreign('subject_id')->references('id')->on('subjects');
        $table->foreignId('level_id')->constrained('levels', 'id');
        $table->integer('semester')->notnull()->default(1);
        $table->boolean('has_practical')->notnull()->default(false);
        $table->boolean('isActivated')->notnull()->default(true);
        $table->timestamps();
        $table->unique(['subject_id', 'level_id']);
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects_levels');
    }
};
