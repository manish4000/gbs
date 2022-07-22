<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategoryRelationModel extends Model
{
    use HasFactory;

    protected $fillable = [       
        'job_id','job_category_id'
    ];

    protected $table = "job_categories_relation";
    protected $primaryKey ="id";
    public $timestamps =true;
}
