<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateShortlistJobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShortlitsJobsController extends Controller
{
    public function index(){

          $shortlisted_jobs =   CandidateShortlistJobModel::select('job.id','job.title','job.slug','job.slug','job_types.title as job_type','job.created_at as job_created_at')
                            ->join('job','job.id','=','candidate_shortlist_job.job_id')
                            ->leftjoin('job_types','job_types.id','=','job.job_type_id')
                            ->where('candidate_shortlist_job.user_id',Auth::user()->id)->get();

        return view('website.candidate.shortlist_jobs',compact('shortlisted_jobs'));
    }


    public function delete($id){

       $response =  CandidateShortlistJobModel::where('user_id',Auth::user()->id)->where('job_id',$id)->delete();

        if($response){
            return redirect()->back()->with('success','Remove From Shortlist');
        }else{
            return redirect()->back()->with('failed','Somthing Went wrong');
        }
        
    }
}
