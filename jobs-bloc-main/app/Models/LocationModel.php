<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    use HasFactory;
    protected $fillable = [       
        'title','is_active'
    ];
    protected $table = "locations";
    protected $primaryKey ="id";
    public $timestamps =true;
}
