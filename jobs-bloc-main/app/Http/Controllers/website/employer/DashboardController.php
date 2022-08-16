<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('website.employer.dashboard');                    
    }
}
