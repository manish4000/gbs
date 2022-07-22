<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidateExperienceModel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'user_id','ex_title','ex_start_date','ex_end_date','ex_company','ex_description'
    ];

    protected $table = "candidate_experience";
    protected $primaryKey ="id";
    public $timestamps =true;
}
