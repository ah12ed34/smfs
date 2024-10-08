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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("file_id")->constrained("group_files");
            $table->foreignId("student_group_id")->constrained("group_students");
            $table->string('file');
            $table->string('file2')->nullable();
            $table->decimal('grade', 5, 2)->nullable();
            $table->date('delivery_date')->default(now());
            $table->text('comment')->nullable();
            $table->unique(['file_id', 'student_group_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
