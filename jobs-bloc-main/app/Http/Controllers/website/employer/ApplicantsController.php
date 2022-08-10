<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantsController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;

        $applicants = JobModel::select("job.id",'job.title','users.name as username','users','job_applications.job_id','job_applications.user_id as user_id')
                            ->leftJoin('job_applications','job_applications.job_id','=','job.id')
                            ->leftJoin('users','users.id','=','job_applications.user_id')
                            ->where('job.submit_by',$user_id)->get();

        return view('website.employer.applicants',compact('applicants'));                    
    }
}
