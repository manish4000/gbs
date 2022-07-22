<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachesModel extends Model
{
    use HasFactory;
    
    protected $table = "coaches";
    protected $primaryKey ="id";
}
