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


    public function delete(Request $request){

        $response =  EmployerShortlistCandidateModel::where('employer_id',Auth::user()->id)->where('candidate_id',$request->id)->delete();

        if($response){
            return redirect()->back()->with('success','Remove From Shortlist');
        }else{
            return redirect()->back()->with('failed','Somthing Went wrong');
        }
    }

}
