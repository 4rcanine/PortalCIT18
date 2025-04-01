<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'units',
        'tuition_per_unit',
    ];

    public function programs(): BelongsToMany // Add this method
{
    return $this->belongsToMany(Program::class, 'program_subject', 'subject_id', 'program_id')
                ->withTimestamps(); // If your pivot table has timestamps
}

public function prerequisites(): BelongsToMany
{
    return $this->belongsToMany(
        Subject::class,            // Related model
        'subject_prerequisites',   // Pivot table name
        'subject_id',              // Foreign key on pivot table for THIS model
        'prerequisite_id'          // Foreign key on pivot table for the RELATED model (the prerequisite)
    )->withTimestamps();
}

/**
 * The subjects for which THIS subject is a prerequisite.
 */
public function isPrerequisiteFor(): BelongsToMany
{
    return $this->belongsToMany(
        Subject::class,            // Related model
        'subject_prerequisites',   // Pivot table name
        'prerequisite_id',         // Foreign key on pivot table for THIS model (when it's the prerequisite)
        'subject_id'               // Foreign key on pivot table for the RELATED model (the one that needs this subject)
    )->withTimestamps();
}

    // Relationships will be added later (prerequisites, programs, enrollments)
}