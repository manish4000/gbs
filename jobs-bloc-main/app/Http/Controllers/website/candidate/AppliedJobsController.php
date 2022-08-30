<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use App\Models\JobApplicationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppliedJobsController extends Controller
{
    public function index(){

        $applied_jobs =   JobApplicationModel::select('job.id','job.title','job.slug','job.slug','job_types.title as job_type','job.created_at as job_created_at')
        ->join('job','job.id','=','job_applications.job_id')
        ->leftjoin('job_types','job_types.id','=','job.job_type_id')
        ->where('job_applications.user_id',Auth::user()->id)->get();

        return view('website.candidate.applied_jobs',compact('applied_jobs'));
    }
}
