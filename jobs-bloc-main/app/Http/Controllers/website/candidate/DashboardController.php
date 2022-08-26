<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('website.candidate.dashboard');                    
    }
}
