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
            $table->string("file");
            $table->string("file2")->nullable();
            $table->integer('onChapter');
            $table->enum('type',['assaignment','chapter','form_exem','summary']);
            $table->boolean("is_active")->default(true);
            $table->decimal('grade', 3, 2)->nullable();
            $table->foreignId("subject_id")->constrained("group_subjects");
            $table->foreignId("user_id")->constrained("users")->nullable();
            $table->date('start_date');
            $table->date('due_date');
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
