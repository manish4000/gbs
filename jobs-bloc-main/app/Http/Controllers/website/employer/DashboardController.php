<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Models\EmployerShortlistCandidateModel;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $posted_jobs_count = JobModel::where('submit_by',Auth::user()->id)->where('is_active',1)->count();

        $shorlisted_resume = EmployerShortlistCandidateModel::where('employer_id',Auth::user()->id)->count();

        return view('website.employer.dashboard',compact('posted_jobs_count','shorlisted_resume'));                    
    }
}
