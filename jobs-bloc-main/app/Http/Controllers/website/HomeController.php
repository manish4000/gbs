<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Job\JobTypeModel;
use App\Models\JobModel;
use App\Models\LocationModel;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){

       $locations =  LocationModel::where('is_active',1)->get();

       $testmonials = TestimonialModel::where('is_active',1)->get();

        $job_types =  JobTypeModel::where('is_active',1)->get();

        $featured_jobs = JobModel::select('job.*','job_types.title as job_type')->leftJoin('job_types','job_types.id','=','job.job_type_id')->where('job.is_active',1)->where('job.is_feature',1)->get();

        return view('website.home',compact('locations','testmonials','job_types','featured_jobs'));
    }

}
