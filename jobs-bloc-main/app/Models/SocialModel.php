<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialModel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'facebook','insatgram','twitter','linkdin'
    ];

    protected $table = "website_social";
    protected $primaryKey ="id";
    public $timestamps =true;

}
