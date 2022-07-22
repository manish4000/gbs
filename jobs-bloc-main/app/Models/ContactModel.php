<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;

    protected $fillable = [        
        'email','address','phone'
    ];

    protected $table = "website_contact";
    protected $primaryKey ="id";
    public $timestamps =true;
}
