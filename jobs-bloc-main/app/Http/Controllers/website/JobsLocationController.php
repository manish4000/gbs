<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\LocationModel;
use Illuminate\Http\Request;

class JobsLocationController extends Controller
{
    public function index(){

        $job_locations = LocationModel::where('is_active',1)->get();

 
        return view('website.jobs_by_location',compact('job_locations'));

    }
}
