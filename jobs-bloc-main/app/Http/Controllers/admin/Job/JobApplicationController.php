<?php

namespace App\Http\Controllers\admin\Job;

use App\Http\Controllers\Controller;
use App\Models\JobApplicationModel;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    public function index(){

        $job_applications = JobApplicationModel::select('job_applications.*','users.name as user_name','job.title as application_for')
                            ->leftJoin('job','job.id','=','job_applications.job_id')
                            ->leftjoin('users','users.id','=','job_applications.user_id')->orderBy('created_at')->paginate(10);

        return view('admin.job.job_application',compact('job_applications'));

    }

    public function destroy($id){

        $job_application_model =  JobApplicationModel::find($id);
        

        if($job_application_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }


}
