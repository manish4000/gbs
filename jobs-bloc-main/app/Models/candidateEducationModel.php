<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidateEducationModel extends Model
{
    use HasFactory;  
      protected $fillable = [        
        'user_id','ed_title','ed_academy','ed_year','ed_description'
    ];

    protected $table = "candidate_education";
    protected $primaryKey ="id";
    public $timestamps =true;
}
