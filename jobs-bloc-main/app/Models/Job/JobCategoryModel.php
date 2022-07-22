<?php

namespace App\Models\Job;

use App\Models\JobModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategoryModel extends Model
{
    use HasFactory;

    protected $fillable = [       
        'title','parent_id','slug','order','is_featured','is_active'
    ];

    protected $table = "job_categories";
    protected $primaryKey ="id";
    public $timestamps =true;


    public function children(){

        return $this->hasMany(JobCategoryModel::class ,'parent_id')->with('children');
    }


    public function Jobs(){

        return $this->belongsToMany(JobModel::class,'job_categories_relation','job_category_id','job_id');
    }


}
