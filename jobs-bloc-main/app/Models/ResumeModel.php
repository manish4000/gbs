<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeModel extends Model
{
    use HasFactory;

    protected $fillable = [       
        'user_id','portfolio_photos','cv'
    ];
    protected $table = "candidate_resume";
    protected $primaryKey ="id";
    public $timestamps =true;
}
