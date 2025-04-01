<?php // ... create_subjects_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            // vvv ENSURE THIS LINE EXISTS AND IS CORRECT vvv
            $table->string('code')->unique(); // Unique subject code
            // ^^^ ENSURE THIS LINE EXISTS AND IS CORRECT ^^^
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('units');
            $table->decimal('tuition_per_unit', 8, 2)->default(500.00);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};