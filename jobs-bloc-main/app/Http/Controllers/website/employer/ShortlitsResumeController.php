<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Models\EmployerShortlistCandidateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortlitsResumeController extends Controller
{
    public function index(){

       $shortlisted_resume = EmployerShortlistCandidateModel::where('employer_id',Auth::user()->id)->get();

        return view('website.employer.shortlist_candidates',compact('shortlisted_resume'));
    }
}
