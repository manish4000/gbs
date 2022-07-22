<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateDetailsModel;

use App\Models\Job\JobCategoryModel;
use App\Models\LocationModel;
use App\Models\Job\SalaryTypeModel;
use App\Models\socialNetworks;
use App\Models\User;
use App\Models\UserSocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){    

        $user_details = Auth::user();
        $candidate_details  = CandidateDetailsModel::where('user_id',$user_details->id)->first();
        $locations = LocationModel::where('is_active',1)->get();
        $salary_types =  SalaryTypeModel::where('is_active',1)->get();
        $social_networks = socialNetworks::where('is_active',1)->get();
        $job_categories = JobCategoryModel::where('is_active',1)->get();

        $user_social_networks = UserSocialNetwork::where('user_id',$user_details->id)->get();

        return view('website.candidate.profile',compact('salary_types','user_details','candidate_details','locations','job_categories','social_networks','user_social_networks'));
    }

    public function updateProfile(Request $request){


            // return response($request->all());

          $validator = Validator::make($request->all(), [  
            'name' => 'nullable|string',
            'phone' => 'nullable|numeric|digits_between:10,10',
            'address' => 'nullable', 
            'dob' => 'nullable|date' ,
            'email' => "required|email",
            'featured_image' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'cover_image' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'profile_image' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'job_title' => "nullable|string",
            'salary' =>"nullable|numeric",
            'salary_type_id' =>"nullable|numeric",
            'introduction_video_url' =>"nullable|url",
            'url.*' =>"nullable|url",
            'network.*' =>"nullable|numeric",
            'candidate_job_categories' => "nullable|array",
            'description' => "nullable",
            'location_id' => "nullable|numeric",
            'friendly_address' => "nullable|string",
            'candidate_tags' => "nullable|string",

        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


            return DB::transaction( function() use ($request){
                        //this is for user update
                        $user =   User::find(Auth::user()->id);

                        $user->name = $request->name;
                        $user->phone = $request->phone;
                        $user->email = $request->email;
            
                        $user->save(); 

                    //this part for save user social network saving 


                         $user_social_network_model = new UserSocialNetwork;

                         $user_social_network_model->where('user_id',$user->id)->delete();

                           $social_platform = $request->network;

                           $url = $request->url;

                           $loop_time = ($social_platform == null)? 0 : count($social_platform);

                          for($i =0 ;$i<$loop_time; $i++){

                            $data = [
                             'user_id' => $user->id ,
                             'social_network_id' => $social_platform[$i],
                             'url' => $url[$i]
                            ];

                            $user_social_network_model->insert($data);

                            $data = [];

                          }


                          



                    //check data is already exist or not 
                        $check_data =  CandidateDetailsModel::where('user_id',$user->id)->first();

                        if($check_data == null){
                            $candidate_details = new CandidateDetailsModel();
                        }else{

                            $candidate_details  = CandidateDetailsModel::where('user_id',$user->id)->first();
                        }
                    
                        
                        $candidate_details->user_id =  $user->id;
                
                        if($request->hasFile('featured_image')){
                
                            $image =  $request->file('featured_image');
                            $extension = $image->getClientOriginalExtension();
                            $file_name = 'candidate-'.time().'.'.$extension;
                            $image->move(CANDIDATE_FEATURE_IMAGE_URL,$file_name);
                            $candidate_details->featured_image = $file_name;
                        }

                        if($request->hasFile('cover_image')){
                
                            $image =  $request->file('cover_image');
                            $extension = $image->getClientOriginalExtension();
                            $file_name = 'candidate-'.time().'.'.$extension;
                            $image->move(CANDIDATE_COVER_IMAGE_URL,$file_name);
                            $candidate_details->cover_image = $file_name;
                        }   

                        $job_categories=  ($request->candidate_job_categories)?? null;

                        if($job_categories != null){

                            $job_categories = implode(',', $job_categories);
                        }


                        $candidate_details->dob = $request->dob;
                        $candidate_details->candidate_job_categories = $job_categories;
                        $candidate_details->job_title = $request->job_title;
                        $candidate_details->salary = $request->salary;
                        $candidate_details->salary_type_id = $request->salary_type_id;
                        $candidate_details->introduction_video_url = $request->introduction_video_url;
                        $candidate_details->description = $request->description;
                        $candidate_details->location_id = $request->location_id;
                        $candidate_details->friendly_address = $request->friendly_address;
                        $candidate_details->candidate_tags = $request->candidate_tags;
                            


                        if($candidate_details->save()){

                            return response()->json(['status' => 200, "msg" =>"your data is update ",$social_platform ]); 

                        }else{

                            DB::rollback();
                            return response()->json(['status' => 500, "msg" =>"database error" ]); 
                        } 

           
    });

    }
}

}
