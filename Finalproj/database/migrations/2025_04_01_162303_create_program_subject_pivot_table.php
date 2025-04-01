<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// The class name might still have _pivot in it, that's okay.
return new class extends Migration
{
    public function up(): void
    {
        // VVV Change this line VVV
        Schema::create('program_subject', function (Blueprint $table) {
        // ^^^ Change this line ^^^
            $table->id();
            $table->foreignId('program_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['program_id', 'subject_id']);
        });
    }

    public function down(): void
    {
         // VVV Change this line VVV
        Schema::dropIfExists('program_subject');
         // ^^^ Change this line ^^^
    }
};