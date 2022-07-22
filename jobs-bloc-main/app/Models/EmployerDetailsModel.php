<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerDetailsModel extends Model
{
    use HasFactory;

    
    protected $fillable = [       
        'id',
        'logo_image',
        'cover_image',
        'employer_job_categories',
        'description',
        'profile_image',
        'founded_date',
        'introduction_video_url',
        'company_name',
        'location_id',
        'friendly_address',
        'website'
                                  ];  

    protected $table = "employer_details";
    protected $primaryKey ="id";
    public $timestamps =true;
}
