<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\CareerWithJobsblocModel;
use Illuminate\Http\Request;

class CareerWithJobblocController extends Controller
{
    public function index(){

      $career_application_data =   CareerWithJobsblocModel::paginate(10);

      return view('admin.job.career_application',compact('career_application_data'));

    }   

    public function destroy($id){

        $job_application_model =  CareerWithJobsblocModel::find($id);

        $resume  = $job_application_model->resume;

        if(file_exists(APP_PATH.CAREER_WITH_JOBSBLOC_RESUME.$resume)){

            unlink (APP_PATH.CAREER_WITH_JOBSBLOC_RESUME.$resume);
        }


        if($job_application_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }

}
