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
        Schema::create('studyings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("student_id")->constrained('group_students');
            $table->foreignId("subject_id")->constrained('group_subjects');
            //   ('present', 'late', 'absent', 'permit')
            $arrPersents = ['present','late','absent','permit'];
            $table->enum('persents1',$arrPersents)->nullable();
            $table->enum('persents2',$arrPersents)->nullable();
            $table->enum('persents3',$arrPersents)->nullable();
            $table->enum('persents4',$arrPersents)->nullable();
            $table->enum('persents5',$arrPersents)->nullable();
            $table->enum('persents6',$arrPersents)->nullable();
            $table->enum('persents7',$arrPersents)->nullable();
            $table->enum('persents8',$arrPersents)->nullable();
            $table->enum('persents9',$arrPersents)->nullable();
            $table->enum('persents10',$arrPersents)->nullable();
            $table->enum('persents11',$arrPersents)->nullable();
            $table->enum('persents12',$arrPersents)->nullable();
            $table->enum('persents13',$arrPersents)->nullable();
            $table->enum('persents14',$arrPersents)->nullable();
            $table->enum('persents15',$arrPersents)->nullable();
            $table->boolean('is_completed')->default(false);
            $table->decimal('addional_grades', 3, 2)->nullable();
            $table->decimal('helf_exem', 3, 2)->nullable();
            $table->decimal('final_exem', 3, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studyings');
    }
};
