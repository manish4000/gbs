<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\CandidateShortlistJobModel;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\JobCategoryRelationModel;
use App\Models\Job\JobTypeModel;
use App\Models\JobApplicationModel;
use App\Models\JobModel;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    
    public function index(){
        $jobs_data = JobModel::where('is_active',1)->get();

        $Job_types = JobTypeModel:: where('is_active',1)->get();
        $job_categories = JobCategoryModel::where('is_active',1)->where('parent_id',null)->get();
        $locations = LocationModel::where('is_active',1)->get();


        return view('website.jobs',compact('jobs_data','Job_types','job_categories','locations'));
    }


    public function jobDetails(Request $request){

        $job_data = JobModel::select('job.*','locations.title as location','job_types.title as job_type')->leftjoin('job_types','job_types.id','=','job.job_type_id')
                                ->leftjoin('locations','locations.id','=','job.location_id')    
                                ->where('job.id',$request->id)->first();


                          $job_categories =  JobCategoryRelationModel::select('job_category_id')->where('job_id', $request->id)->get()->toArray();

                          
                        if($job_categories != null){

                            $job_categories_ids =    array_column($job_categories, 'job_category_id');  

                            

                            $related_jobs = JobModel::select('job.*','locations.title as location','job_types.title as job_type')->leftjoin('job_types','job_types.id','=','job.job_type_id')
                            ->leftjoin('locations','locations.id','=','job.location_id')
                            ->join('job_categories_relation','job_categories_relation.job_id','=','job.id')    
                            ->whereIn('job_categories_relation.job_category_id',$job_categories_ids)->distinct()->get();


                        }else{
                            $related_jobs = [];
                        }                          
                         




        return view('website.job_details' ,compact('job_data','related_jobs' ));


    }


    public function applyJob(Request $request){

        $validator = Validator::make($request->all(), [  
            'name' => 'required|string',
            'phone' => 'required|numeric|digits_between:10,10',
            'email' => "required|email",
            'message' => "required",
            'resume' => 'required|file|max:3000|mimes:pdf,docx,doc',         
            'job_id' => "required|numeric",
        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                $job_application_model  = new  JobApplicationModel;
                $job_application_model->user_id = Auth::user()->id;
                $job_application_model->job_id =  $request->job_id;
                $job_application_model->name = $request->name;
                $job_application_model->phone = $request->email;
                $job_application_model->email = $request->email;
                $job_application_model->message =  $request->message;


                if($request->hasFile('resume')){
                                 
                    $image =  $request->file('resume');
                    $extension = $image->getClientOriginalExtension();
                    $file_name = time().'.'.$extension;

                    $image->move(JOB_APPLICATIONS_RESUME_URL,$file_name);

                    $job_application_model->resume = $file_name;

             } 


             if($job_application_model->save()){

                return response()->json([
                    "status" => 200,
                    "message" => "You have successfully applied to the job"
                ]);
             }

        }        

    }


    public function shortlistJob(Request $request){


        if(Auth::user()->role != "candidate"){

            return response()->json([
                "status" => 401,
                "message" => "Please Log in As an Candidate"
            ]);
          
        }else{

                $candidate_shortlist_job_model = new CandidateShortlistJobModel();

                $check =  $candidate_shortlist_job_model->where('user_id',Auth::user()->id)->where('job_id',$request->job_id)->first();

                  if($check == null){

                    $candidate_shortlist_job_model->job_id = $request->job_id;
                    $candidate_shortlist_job_model->user_id = Auth::user()->id;
                    $candidate_shortlist_job_model->save();

                    if($candidate_shortlist_job_model->id){

                        return response()->json([
                            "status" => 200,
                            "message" => "Job has been added to the shortlist successfully"
                        ]);

                        // session()->flash('shortlist_job_added', 'Job has been added to the shortlist successfully');
                     
                    }

                  } else{
                    if($check->delete()){

                        return response()->json([
                            "status" => 200,
                            "message" => "Job has been Remove the shortlist successfully'"
                        ]);
                        // session()->flash('shortlist_job_remove', 'Job has been Remove the shortlist successfully');
                      
                    }

                  } 
          }

             
          return redirect()->route('jobs',['id' => $request->job_id]);

    }
}
