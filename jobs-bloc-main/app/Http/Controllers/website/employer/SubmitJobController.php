<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Mail\JobSubmitEmail;
use App\Models\candidateSkillModel;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\JobCategoryRelationModel;
use App\Models\Job\JobTypeModel;
use App\Models\Job\SalaryTypeModel;
use App\Models\JobApplicationModel;
use App\Models\JobLocationModel;
use App\Models\JobModel;
use App\Models\JobSkillModel;
use App\Models\LocationModel;
use Illuminate\Support\Str;
use App\Models\SkillModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SubmitJobController extends Controller
{   
    

    public function index(){

        $job_types =  JobTypeModel::get();
        $skills = SkillModel::get();
        $location = LocationModel::get();
        $job_categories = JobCategoryModel::get();
        $salary_type = SalaryTypeModel::get();

        return view('website.employer.submit_job',compact('skills','job_types','location','salary_type','job_categories'));
    }

    public function submitJob(Request $request){

        $validator = Validator::make($request->all(), [   
            'title' => 'required|string|unique:job,title',
            'job_type_id' => 'required|numeric',
            'job_category_id' => 'required|array',
            'skill_id' => 'required|array',
            'description' => 'required',
            'feature_image' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
            'application_deadline_date' => 'required|date',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
            'salary_type_id' => 'required|numeric',
            'location_id.*' => 'required|numeric',
            'address' => 'required',
             [
                'job_type_id.required' => 'please Select Job type',
                'job_category_id.required' => 'please Select Job Category',
                'skill_id.required' => 'please Select Skill ',
                'salary_type_id.required' => 'please Select Salary Type ',
                'location_id.required' => 'please Select Job Locations ',
               
            ]
                       
        ]);


        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


                return DB::transaction( function() use ($request){

                        if( isset($request->id)){
                            $job_model = JobModel::find($request->id);
                            $old_image_name = ($job_model->feature_image)?? 'no_image.jpg';
                       
                        }else{
                            $job_model = new JobModel;
                            $old_image_name = 'no_image.jpg';
                        }

                            $job_model->title =       ucwords( $request->input('title') );
                            $job_model->slug    =      Str::slug( $request->input('title') );
                            $job_model->job_type_id =          $request->input('job_type_id');
                            $job_model->is_active =          $request->input('is_active');
                            $job_model->description =          $request->input('description');
                            $job_model->application_deadline_date =   $request->input('application_deadline_date');
                            $job_model->min_salary =          $request->input('min_salary');
                            $job_model->max_salary =          $request->input('max_salary');
                            $job_model->salary_type_id =          $request->input('salary_type_id');
                            $job_model->address =          $request->input('address');
                            $job_model->is_active = 1;
                            $job_model->submit_by = Auth::user()->id;

                            if($request->hasFile('feature_image')){

                                $image =  $request->file('feature_image');
                                $extension = $image->getClientOriginalExtension();
                                $file_name = time().'.'.$extension;
                                $image->move(JOB_FEATURE_IMAGE_URL,$file_name);
                                $job_model->feature_image = $file_name;

                                if(file_exists(public_path(JOB_FEATURE_IMAGE_URL.$old_image_name))){
                                    unlink (public_path(JOB_FEATURE_IMAGE_URL.$old_image_name));
                                }
                            } 

                             $job_model->save();

                            if($job_model->id){
                                
                                $job_category_relation_model = new JobCategoryRelationModel; 
                                
                                $job_category_relation_model->where('job_id',$job_model->id)->delete();
                                $loop_time = ($request->job_category_id == null)? 0 : count($request->job_category_id);
     
                               for($i =0 ;$i<$loop_time; $i++){
     
                                 $data = [
                                  'job_id' =>$job_model->id ,
                                  'job_category_id' => $request->job_category_id[$i],
                              
                                 ];
     
                                 $job_category_relation_model->insert($data);
                                 $data = [];
                                 $response = true;
                               }

                                    $job_location_model=   new JobLocationModel;
                                    $job_location_model->where('job_id',$job_model->id)->delete();

                                    $location_loop = ($request->location_id == null)? 0 : count($request->location_id);
     
                                    for($i =0 ;$i<$location_loop; $i++){
          
                                      $location_ids = [
                                       'job_id' =>$job_model->id ,
                                       'location_id' => $request->location_id[$i],
                                      ];
                                      $job_location_model->insert($location_ids);
                                      $location_ids = [];
                                      $response = true;
                                    }

                                    $job_skill_model = new JobSkillModel;
                                    $job_skill_model->where('job_id',$job_model->id)->delete();

                                    $skill_loop = ($request->skill_id == null)? 0 : count($request->skill_id);

                                    
                                    for($i =0 ;$i<$skill_loop; $i++){
                                        $skill_ids = [
                                         'job_id' =>$job_model->id ,
                                         'skill_id' => $request->skill_id[$i],
                                        ];
                                        $job_skill_model->insert($skill_ids);
                                        $skill_ids = [];
                                        $response = true;
                                      }
                            }


                            if($response){

                                $this->sendEmail($request->skill_id);

                                 return response()->json(['status' => 200, "msg" =>"your data is saved"]); 
    
                            }else{
    
                                DB::rollback();
                                return response()->json(['status' => 500, "msg" =>"database error" ]); 
                            } 
    

        });

        }

    }   


    public function sendEmail($skills)
    {
        $users = candidateSkillModel::select('user_id')->whereIn("skill_id",$skills)->distinct()->get()->toArray();

        $users = array_column($users,'user_id');

        $users = User::select('email')->whereIn('id',$users)->get();


        foreach ($users as  $user) {
            Mail::to($user->email)->send(new JobSubmitEmail);
        }
        
        return true;
        // return response()->json(['success'=>'Send email successfully.']);
    }



    public function myJobs(){


    $user_id = Auth::user()->id;

    $my_jobs = DB::table("job")
          ->select("job.*",
                    DB::raw("(SELECT COUNT(job_applications.job_id) FROM job_applications
                                WHERE job_applications.job_id = job.id
                                GROUP BY job_applications.job_id) as applicants"),
          )->where('job.submit_by',$user_id)->get();

        return view('website.employer.my_jobs',compact('my_jobs'));

     }

}
