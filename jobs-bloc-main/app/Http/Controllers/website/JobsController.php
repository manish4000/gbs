<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\ApplyJobEmail;
use App\Models\CandidateShortlistJobModel;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\JobCategoryRelationModel;
use App\Models\Job\JobTypeModel;
use App\Models\JobApplicationModel;
use App\Models\JobLocationModel;
use App\Models\JobModel;
use App\Models\LocationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    
    public function index(Request $request){

   
       $job_location_checked =   (($request->job_location != '') || ($request->job_location != null) )? explode(',',$request->job_location) : null;

       $job_category_checked =   ($request->job_category != '') ? explode(',',$request->job_category) : null;

                         

       $job_type_checked  =   ($request->job_type != '') ? $request->job_type  : null;


        $job_data = JobModel::select('job.id','job.title','job.slug','job.feature_image')->where('job.is_active',1);

        if($request->has('title')){

            $job_data->where('job.title','like','%'.$request->title.'%');
        }
        if($request->has('sub_category')){

            $job_data->leftJoin('job_categories_relation','job_categories_relation.job_id','job.id')->where('job_categories_relation.job_category_id',$request->sub_category);
        }

        if($job_location_checked != null){
            $job_data->leftJoin('job_locations','job_locations.job_id','job.id')->whereIn('job_locations.location_id',$job_location_checked);
        }
        if($job_category_checked != null){

            $sub_categories = JobCategoryModel::select('id')->whereIn('parent_id',$job_category_checked)->get()->toArray();

            $all_subcategory_id = array_column($sub_categories, 'id');

    

            $job_data->leftJoin('job_categories_relation','job_categories_relation.job_id','job.id')->whereIn('job_categories_relation.job_category_id',$job_category_checked);
           
        }
         if($job_type_checked != null){
              $job_data->where('job.job_type_id',$job_type_checked);
         }

        $jobs_data = $job_data->get();



        $Job_types = JobTypeModel:: where('is_active',1)->get();

        $job_categories = JobCategoryModel::where('is_active',1)->where('parent_id',null)->get();
        $locations = LocationModel::where('is_active',1)->get();


        return view('website.jobs',compact('jobs_data','Job_types','job_categories','locations','job_location_checked','job_category_checked','job_type_checked'));
    }


    public function jobDetails(Request $request){

        $job_data = JobModel::select('job.*','job_types.title as job_type')->leftjoin('job_types','job_types.id','=','job.job_type_id')
                                  
                                ->where('job.id',$request->id)->first();

        $job_data->location = JobLocationModel::select('locations.title')->leftJoin('locations','locations.id','=','job_locations.location_id')->where('job_id',$request->id)->get();                        

                          $job_categories =  JobCategoryRelationModel::select('job_category_id')->where('job_id', $request->id)->get()->toArray();

                          
                        if($job_categories != null){

                            $job_categories_ids =    array_column($job_categories, 'job_category_id');  

                            $related_jobs = JobModel::select('job.*','job_types.title as job_type')->leftjoin('job_types','job_types.id','=','job.job_type_id')
                            ->join('job_categories_relation','job_categories_relation.job_id','=','job.id')    
                            ->whereIn('job_categories_relation.job_category_id',$job_categories_ids)->distinct()->get();


                        }else{
                            $related_jobs = [];
                        }                          
                         

        


        return view('website.job_details' ,compact('job_data','related_jobs' ));


    }


    public function applyJob(Request $request){

        if(Auth::user()->role != 'candidate'){
            return response()->json([
                "status" => 500,
                "message" => "Please Log in As an Candidate"
            ]);
        }

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
                
                $job_data =  JobModel::where('id',$request->job_id)->first();
                //an email send to employer 
                $job_submited_by = User::select('email')->where('id',$job_data->submit_by)->first();
                $send_to = $job_submited_by->email;
                
                Mail::to($send_to)->send(new ApplyJobEmail());
                
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
