<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

protected $fillable = [
    'candidate_id',
    'resume_file',
    'resume_text',
    'skills',
    'category',
    'resume_score',
    'analysis_status'
];

    
    public function candidate()
{
    return $this->belongsTo(User::class,'candidate_id');
}
}
