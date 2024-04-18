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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("file")->nullable();
            $table->string("file2")->nullable();
            // description
            $table->text("description")->nullable();
            $table->integer('onChapter')->nullable();
            $table->enum('type',['assignment','chapter','form_exem','summary']);
            $table->boolean("is_active")->default(true);
            $table->decimal('grade', 4, 2)->nullable();
            $table->foreignId("subject_id")->constrained("group_subjects");
            $table->foreignId("user_id")->constrained("users");
            $table->date('start_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
