<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // e.g., "Bachelor of Science in Computer Science"
            $table->string('code')->unique()->nullable(); // e.g., "BSCS", optional unique code
            $table->text('description')->nullable(); // Optional description
            // Add any other relevant fields like 'department_id', 'duration_years', etc. if needed
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};