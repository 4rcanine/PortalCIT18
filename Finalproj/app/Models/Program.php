<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

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
}