<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\candidateAwardModel;
use App\Models\CandidateDetailsModel;
use App\Models\candidateEducationModel;
use App\Models\candidateExperienceModel;
use App\Models\candidateSkillModel;
use App\Models\EmployerDetailsModel;
use App\Models\EmployerTeamModel;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\SalaryTypeModel;
use App\Models\LocationModel;
use App\Models\socialNetworks;
use App\Models\User;
use App\Models\UserSocialNetwork;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){



         $locations = LocationModel::select('id','title')->get();
        $categories = JobCategoryModel::select('id','title')->get();

        $user_role = $request->role;




        if($user_role == "candidate"){

            $user_data =  User::select('users.id','users.name','users.email','users.phone','users.is_active','users.created_at','candidate_details.location_id','locations.title as location')
            ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
            ->leftJoin('locations','locations.id','=','candidate_details.location_id');
      

            if(!empty($request->category)){
          
                $user_data->where('users.job_category_id',$request->category);
    
            }if(!empty($request->location)){
                $user_data->where('candidate_details.location_id',$request->location);

            }if($request->status == 0){
                $user_data->where('users.is_active',0);
            }if($request->status == 1){
                 $user_data->where('users.is_active',1);
        }

            $user_data = $user_data->where('role',$request->role)->paginate(10);

            return view('admin.user.candidate',compact('user_data','locations','categories','user_role'));

        }elseif($user_role == "employer"){    


            $user_data =  User::select('users.id','users.name','users.email','users.phone','users.is_active','users.created_at','employer_details.location_id','locations.title as location')
            ->leftJoin('employer_details','employer_details.id','=','users.id')
            ->leftJoin('locations','locations.id','=','employer_details.location_id');
            

            if(!empty($request->category)){
          
                $user_data->where('job_category_id',$request->category);
    
            }if(!empty($request->location)){
                $user_data->where('employer_details.location_id',$request->location);

            }if($request->status == 0){
                $user_data->where('users.is_active',0);
            }if($request->status == 1){
                 $user_data->where('users.is_active',1);
             }

            $user_data = $user_data->where('role',$request->role)->paginate(10);

            return view('admin.user.employer',compact('user_data','locations','categories','user_role'));
        }
      

    }


    public function changeStatus(Request $request){

        $data =  User::select('is_active')->where('id',$request->id)->first()->toArray();;

        $status =($data['is_active'] == '1')?'0':'1';

      if(User::where('id',$request->id)->update(['is_active'=> $status ])){

        return   redirect()->back()->with('status_update','The status is updated');       

       }else{
           return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
       }  

    }

    public function profile(Request $request){


        $user = User::select('role')->where('id',$request->id)->first();
  

        if($user->role == "candidate"){

            $resume =   User::select('users.*','candidate_details.*','candidate_resume.portfolio_photos','candidate_resume.cv','locations.title as location','job_categories.title as job_category')
            ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
            ->leftJoin('locations','locations.id','=','candidate_details.location_id')
            ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')
            ->leftJoin('candidate_education','candidate_education.user_id','=','users.id')
            ->leftJoin('candidate_resume','candidate_resume.user_id','=','users.id')
            ->where('users.id',$request->id)->first(); 

        

                $resume_education = candidateEducationModel::where('user_id',$request->id)->get();                                        
                $resume_experience = candidateExperienceModel::where('user_id',$request->id)->get();                                        
                $resume_awards = candidateAwardModel::where('user_id',$request->id)->get();                                        
                $resume_skills = candidateSkillModel::where('user_id',$request->id)->get();  

                $resume_social = UserSocialNetwork::select('user_social_networks.user_id','user_social_networks.url','user_social_networks.social_network_id','social_networks.title')
                                ->leftJoin('social_networks','social_networks.id','=','user_social_networks.social_network_id')     
                                ->where('user_id',$request->id)->get();  
                    
            return view('admin.user.candidate_profile',compact('resume','resume_education','resume_experience','resume_awards','resume_skills','resume_social'));

        }elseif($user->role == "employer"){    

            $employer_details =   User::select('users.id','users.job_category_id as main_category','users.name as user_name','users.email','users.phone','employer_details.logo_image','employer_details.cover_image','employer_details.profile_image','employer_details.founded_date','employer_details.company_name','employer_details.website','employer_details.introduction_video_url','employer_details.introduction_video_url','employer_details.description','employer_details.location_id','locations.title as location','employer_details.friendly_address','job_categories.title as job_category')
                                   ->leftJoin('employer_details','employer_details.id','=','users.id')   
                                   ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')     
                                   ->leftJoin('locations','locations.id','=','employer_details.location_id')        
                                   ->where('users.id',$request->id)->first();

            $employer_social = UserSocialNetwork::select('user_social_networks.user_id','user_social_networks.url','user_social_networks.social_network_id','social_networks.title')
                                                   ->leftJoin('social_networks','social_networks.id','=','user_social_networks.social_network_id')     
                                                    ->where('user_id',$request->id)->get();   
                                                    
            $employer_teams = EmployerTeamModel::where('user_id',$request->id)->get();                                        
            
            return view('admin.user.employer_profile',compact('employer_details','employer_social','employer_teams'));



        }

    }



}
