<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialNetworks extends Model
{
    use HasFactory;
    protected $fillable = [        
        'title','is_active'
    ];

    protected $table = "social_networks";
    protected $primaryKey ="id";
    public $timestamps =true;
}
