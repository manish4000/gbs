<?php

namespace App\Models;

use App\Models\Job\JobCategoryModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobModel extends Model
{
    use HasFactory;

    protected $table = "job";
    protected $primaryKey ="id";
    public $timestamps =true;


    public function categories()
    {
        return $this->belongsToMany(JobCategoryModel::class,'job_categories_relation','job_category_id','job_id');
    }




}
