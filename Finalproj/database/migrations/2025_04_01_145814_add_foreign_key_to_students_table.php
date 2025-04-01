<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Change program_id to be non-nullable and add foreign key constraint
            // Ensure the column type matches the 'id' column type in 'programs' (unsignedBigInteger)
            $table->unsignedBigInteger('program_id')->nullable(false)->change(); // Make it not nullable

            // Add the foreign key constraint
            // Ensure this is added *after* the programs table exists
            $table->foreign('program_id')
                  ->references('id')
                  ->on('programs')
                  ->onDelete('restrict'); // Or 'set null' if a program deletion should allow students to remain without a program
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key first (Laravel convention: table_column_foreign)
            $table->dropForeign(['program_id']);

            // Optionally, make it nullable again if reversing
            $table->unsignedBigInteger('program_id')->nullable()->change();
        });
    }
};