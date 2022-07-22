<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidateSkillModel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'user_id','sk_title','sk_percentage'
    ];

    protected $table = "candidate_skills";
    protected $primaryKey ="id";
    public $timestamps =true;
}
