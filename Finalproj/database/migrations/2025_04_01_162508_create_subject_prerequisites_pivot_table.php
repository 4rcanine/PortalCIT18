<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subject_prerequisites', function (Blueprint $table) {
            $table->id();
            // The subject that HAS the prerequisite
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            // The subject that IS the prerequisite
            $table->foreignId('prerequisite_id')->constrained('subjects')->onDelete('cascade');
            $table->timestamps(); // Optional

            // Prevent duplicate prerequisite entries
            $table->unique(['subject_id', 'prerequisite_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subject_prerequisites');
    }
};