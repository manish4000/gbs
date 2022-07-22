<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobTypeModel extends Model
{
    use HasFactory;


    use HasFactory;
    protected $fillable = [       
        'title','is_active'
    ];
    protected $table = "job_types";
    protected $primaryKey ="id";
    public $timestamps =true;


}
