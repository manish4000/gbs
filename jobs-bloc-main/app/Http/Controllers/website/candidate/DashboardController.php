<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateShortlistJobModel;
use App\Models\JobApplicationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $applied_jobs =   JobApplicationModel::where('user_id',Auth::user()->id)->count();
        $shortlisted_jobs = CandidateShortlistJobModel::where('user_id',Auth::user()->id)->count();

        return view('website.candidate.dashboard',compact('applied_jobs','shortlisted_jobs'));                    
    }
}
