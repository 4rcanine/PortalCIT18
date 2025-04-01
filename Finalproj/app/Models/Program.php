<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'description']; // Add fillable fields

    /**
     * Get the students enrolled in this program.
     */
    public function students(): HasMany // Add this method
    {
        return $this->hasMany(Student::class);
    }
    
    public function subjects(): BelongsToMany // Add this method
{
    // Adjust table name if different, then foreign key, then related key
    return $this->belongsToMany(Subject::class, 'program_subject', 'program_id', 'subject_id')
                ->withTimestamps(); // If your pivot table has timestamps
}
}