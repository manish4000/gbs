<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidateAwardModel extends Model
{
    use HasFactory;
    protected $fillable = [        
        'user_id','aw_title','aw_year','aw_description'
    ];

    protected $table = "candidate_awards";
    protected $primaryKey ="id";
    public $timestamps =true;
}
