<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateDetailsModel extends Model
{
    use HasFactory;

    protected $fillable = [       
        'cover_image','dob','featured_image','candidate_job_categories','job_title','salary','salary_type_id','introduction_video_url','description','location_id','friendly_address','candidate_tags'
    ];

    protected $table = "candidate_details";
    protected $primaryKey ="id";
    public $timestamps =true;
}
