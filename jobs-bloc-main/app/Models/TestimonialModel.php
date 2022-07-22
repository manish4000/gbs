<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'description','image','name','designation' ,'is_active','star','location',
    ];

    protected $table = "testimonials";
    protected $primaryKey ="id";
    public $timestamps =true;
}
