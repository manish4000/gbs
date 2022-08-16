<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Models\JobApplicationModel;
use App\Models\JobModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicantsController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;
        $jobs = JobModel::select("job.id",'job.title','job.slug')
                            ->where('job.submit_by',$user_id)->get();
       

        return view('website.employer.applicants',compact('jobs'));                    
    }

    public function changeApplicationStatus(Request $request){

        $change_status =   JobApplicationModel::where('id',$request->id)->update(['application_status'=>$request->status]);
        return redirect()->back();

    }
    public function changeShortListStatus($id){


            $application_data =  JobApplicationModel::where('id',$id)->first();

            $status = ($application_data->shortlist_status == 1 )? 0 : 1 ;


        $change_status =   JobApplicationModel::where('id',$id)->update(['shortlist_status'=>$status]);
        return redirect()->back();

    }


    public function removeApplication($id){

        JobApplicationModel::where('id',$id)->delete();        

        return redirect()->back();
    }
}
