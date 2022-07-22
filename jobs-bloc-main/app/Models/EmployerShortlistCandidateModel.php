<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerShortlistCandidateModel extends Model
{
    use HasFactory;
    protected $table = "employer_shortlist_resume";
    protected $primaryKey ="id";
}
