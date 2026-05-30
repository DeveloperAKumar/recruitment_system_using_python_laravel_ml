<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'candidate_id',
        'match_score',
        'status',
    ];

    

    public function job()
{
    return $this->belongsTo(Job::class);
}

public function candidate()
{
    return $this->belongsTo(User::class,'candidate_id');
}
}
