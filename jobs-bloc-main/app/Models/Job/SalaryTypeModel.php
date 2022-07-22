<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryTypeModel extends Model
{
    use HasFactory;
    
    protected $fillable = [       
        'title','is_active'
    ];

    protected $table = "salary_types";
    protected $primaryKey ="id";
    public $timestamps =true;
}

