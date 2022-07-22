<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerTeamModel extends Model
{
    use HasFactory;

    protected $fillable = [       
        'user_id','name','designation','experience','profile_image','facebook','twitter','linkedin','instagram','description'
    ];
    protected $table = "employer_teams";
    protected $primaryKey ="id";
    public $timestamps =true;
}
