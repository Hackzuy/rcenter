<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ResearchPaper;

class Review extends Model
{
    protected $fillable = ['research_paper_id', 'reviewer_id', 'invitation_link', 'status', 'comments', 'recommendation'];

    public function researchPaper()
    {
        return $this->belongsTo(ResearchPaper::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
