<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Add this
use App\Models\Program;

class Student extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'student_id_number',
        'year_level',
        'last_name',
        'first_name',
        'middle_initial',
        'program_id', // Add program_id later when programs table exists
        'birthday',
        'sex',
        'nationality',
        'address',
        'civil_status',
    ];

    /**
     * Get the user that owns the student record.
     */
    public function user(): BelongsTo // Add this method
    {
        return $this->belongsTo(User::class);
    }

    public function program(): BelongsTo // Add this method
{
    return $this->belongsTo(Program::class);
}

    // We will add program relationship later
    // public function program(): BelongsTo
    // {
    //     return $this->belongsTo(Program::class);
    // }
}