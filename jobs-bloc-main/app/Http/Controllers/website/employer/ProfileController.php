<?php

namespace App\Http\Controllers\website\employer;

use App\Http\Controllers\Controller;
use App\Models\EmployerDetailsModel;
use App\Models\EmployerTeamModel;
use App\Models\Job\JobCategoryModel;
use App\Models\LocationModel;
use App\Models\socialNetworks;
use App\Models\User;
use App\Models\UserSocialNetwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){    

        $user_details = Auth::user();
        $employer_details  = EmployerDetailsModel::where('id',$user_details->id)->first();
        $locations = LocationModel::where('is_active',1)->get();
    
        $social_networks = socialNetworks::where('is_active',1)->get();
        $job_categories = JobCategoryModel::where('is_active',1)->get();
        $employer_team_details = EmployerTeamModel::where('user_id',$user_details->id)->get();

        $user_social_networks = UserSocialNetwork::where('user_id',$user_details->id)->get();

        return view('website.employer.profile',compact('user_details','social_networks','employer_details','locations','job_categories','employer_team_details','user_social_networks'));
    }

    public function updateProfile(Request $request){




            // return response($request->all());

          $validator = Validator::make($request->all(), [  
            'name' => 'nullable',
            'phone' => 'nullable|numeric|digits_between:10,10',
            'address' => 'nullable', 
            'email' => "required|email",
            'founded_date' => "required|date",
            'logo_image' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'cover_image' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'introduction_video_url' =>"nullable|url",
            'url.*' =>"nullable|url",
            'network.*' =>"nullable|numeric",
            'description' => "nullable",
            'location_id' => "nullable|numeric",
            'friendly_address' => "nullable|string",
            'website' => "nullable|url"

        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


            return DB::transaction( function() use ($request){
                        //this is for user update
                        $user =   User::find(Auth::user()->id);

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
                      //this part for save employer team mamber details     

                        $employer_team_model =    new  EmployerTeamModel;
                        $employer_team_model->where('user_id',$user->id)->delete();

                        $mamber_name = $request->mamber_name; 
                        $mamber_designation = $request->mamber_designation; 
                        $mamber_experience = $request->mamber_experience; 
                        
                        $mamber_facebook = $request->mamber_facebook; 
                        $mamber_twitter = $request->mamber_twitter; 
                        $mamber_linkedin = $request->mamber_linkedin; 
                        $mamber_instagram = $request->mamber_instagram; 
                        $mamber_description = $request->mamber_description; 
                       
                          $mamber_count = ($mamber_name == null)? 0 : count($mamber_name);

                          for($i =0 ;$i<$mamber_count; $i++){


                           

                            $data = [

                             'user_id' => $user->id,
                             'name' => $mamber_name[$i],
                             'designation' => $mamber_designation[$i],
                             'experience' => $mamber_experience[$i],
                    
                             'facebook' => $mamber_facebook[$i],
                             'twitter' => $mamber_twitter[$i],
                             'linkedin' => $mamber_linkedin[$i],
                             'instagram' => $mamber_instagram[$i],
                             'description' => $mamber_description[$i],

                            ];

                            if($request->hasFile('mamber_profile_image')){
                
                                $image =  $request->file('mamber_profile_image')[$i];
                                $extension = $image->getClientOriginalExtension();
                                $file_name = 'employer-team'.time().'.'.$extension;
                                $image->move(EMPLOYER_TEAM_IMAGE_URL,$file_name);

                                $data['profile_image'] = $file_name;
                            }

                            $employer_team_model->insert($data);

                            $data = [];
                          }



                    //check data is already exist or not 
                        $check_data =  EmployerDetailsModel::where('id',$user->id)->first();

                        if($check_data == null){
                            $employer_details = new EmployerDetailsModel();
                        }else{

                            $employer_details  = EmployerDetailsModel::where('id',$user->id)->first();
                        }
                    
                
                        if($request->hasFile('logo_image')){
                
                            $image =  $request->file('logo_image');
                            $extension = $image->getClientOriginalExtension();
                            $file_name = 'employer-'.time().'.'.$extension;
                            $image->move(EMPLOYER_LOGO_IMAGE_URL,$file_name);
                            $employer_details->logo_image = $file_name;
                        }

                        if($request->hasFile('cover_image')){
                
                            $image =  $request->file('cover_image');
                            $extension = $image->getClientOriginalExtension();
                            $file_name = 'candidate-'.time().'.'.$extension;
                            $image->move(EMPLOYER_COVER_IMAGE_URL,$file_name);
                            $employer_details->cover_image = $file_name;
                        }   

                        if($request->hasFile('profile_image')){
                
                            $image =  $request->file('profile_image');
                            $extension = $image->getClientOriginalExtension();
                            $file_name = 'employer-profile'.time().'.'.$extension;
                            $image->move(EMPLOYER_PROFILE_IMAGE_URL,$file_name);
                            $employer_details->profile_image = $file_name;
                        }   

                         $cat=  $request->employer_job_categories;

                          $job_categories = implode(',', $cat);


                        $employer_details->introduction_video_url = $request->introduction_video_url;
                        $employer_details->description = $request->description;
                        $employer_details->website = $request->website;
                        $employer_details->employer_job_categories = $job_categories;
                        $employer_details->founded_date = $request->founded_date;

                        $employer_details->location_id = $request->location_id;
                        $employer_details->friendly_address = $request->friendly_address;

                        if($employer_details->save()){

                            return response()->json(['status' => 200, "msg" =>"your data is update ",$social_platform ]); 

                        }else{

                            DB::rollback();
                            return response()->json(['status' => 500, "msg" =>"database error" ]); 
                        } 

           
    });

    }
}

}
