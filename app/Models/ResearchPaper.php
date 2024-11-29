<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchPaper extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'abstract',
        'status',
        'submission_date',
        'user_id',
    ];
    
    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Define the relationship with Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function researchPaper()
    {
        return $this->belongsTo(ResearchPaper::class);
    }
}
