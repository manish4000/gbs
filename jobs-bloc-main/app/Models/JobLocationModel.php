<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLocationModel extends Model
{
    use HasFactory;
    protected $table = "job_locations";
    protected $primaryKey ="id";


    public function location_data()
    {
        return $this->belongsTo(LocationModel::class,'location_id');
    }

}