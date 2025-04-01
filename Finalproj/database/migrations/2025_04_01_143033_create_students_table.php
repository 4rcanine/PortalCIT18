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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            // vvv THIS LINE IS CRUCIAL vvv
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to 'id' on 'users' table
            // ^^^ ENSURE THIS OR SIMILAR EXISTS AND IS CORRECT ^^^

            $table->string('student_id_number')->unique();
            $table->string('year_level');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial', 5)->nullable();
            $table->unsignedBigInteger('program_id'); // Assuming you added the FK later
            $table->date('birthday');
            $table->string('sex');
            $table->string('nationality');
            $table->text('address');
            $table->string('civil_status');
            $table->timestamps();

            // If you added the program_id foreign key in a separate migration,
            // make sure THAT migration is also correct.
        });
    }

    // ... down() method ...
};