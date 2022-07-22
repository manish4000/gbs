<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialNetwork extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable = [        
        'user_id','social_network_id','url'
    ];
    protected $table = "user_social_networks";
    protected $primaryKey ="id";
    public $timestamps =true;
}
