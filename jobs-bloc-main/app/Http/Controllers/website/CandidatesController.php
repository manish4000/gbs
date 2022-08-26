<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\candidateAwardModel;
use App\Models\candidateEducationModel;
use App\Models\candidateExperienceModel;
use App\Models\candidateSkillModel;
use App\Models\EmployerShortlistCandidateModel;
use App\Models\Job\JobCategoryModel;
use App\Models\LocationModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatesController extends Controller
{
    public function index(Request $request){

        $candidate_location_checked =   (($request->job_location != '') || ($request->job_location != null) )? explode(',',$request->job_location) : null;

        $candidate_category_checked =   ($request->job_category != '') ? explode(',',$request->job_category) : null;


        $candidates_data =   User::select('users.*','candidate_details.location_id','candidate_details.featured_image','locations.title as location','job_categories.title as job_category')
                                                ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
                                                ->leftJoin('locations','locations.id','=','candidate_details.location_id')
                                                ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')
                                                ->where('role','candidate'); 

        if($candidate_category_checked  != null){

            $candidates_data->whereIn('users.job_category_id',$candidate_category_checked);
        }
        if($candidate_location_checked  != null){

            $candidates_data->whereIn('candidate_details.location_id',$candidate_location_checked);
        }


        $candidates = $candidates_data->where('users.is_active',1)->paginate(6);

        $job_categories = JobCategoryModel::where('is_active',1)->orderBy('title')->get();
        $locations = LocationModel::where('is_active',1)->orderBy('title')->get();
        
        return view('website.candidates',compact('candidates','job_categories','locations','candidate_location_checked','candidate_category_checked'));
    }


    public function candidateDetails(Request $request){


        
        // $resume =   User::select('users.id as id','candidate_details.*','candidate_resume.portfolio_photos','candidate_resume.cv','locations.title as location','job_categories.title as job_category')
        //                                         ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
        //                                         ->leftJoin('locations','locations.id','=','candidate_details.location_id')
        //                                         ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')
        //                                         ->leftJoin('candidate_education','candidate_education.user_id','=','users.id')
        //                                         ->leftJoin('candidate_resume','candidate_resume.user_id','=','users.id')
        //                                         ->where('users.id',$request->id)->first()->toArray(); 

                                                
        $resume =   User::select('users.*','candidate_details.featured_image'
                                ,'candidate_details.cover_image',
                                'candidate_details.dob','candidate_details.job_title',
                                'candidate_details.salary','candidate_details.salary_type_id',
                                'candidate_details.introduction_video_url','candidate_details.candidate_job_categories',
                                'candidate_details.description','candidate_details.location_id',
                                'candidate_details.friendly_address',
                                'candidate_details.candidate_tags',
                                'candidate_resume.portfolio_photos','candidate_resume.cv',
                                'locations.title as location',
                                'job_categories.title as job_category',
                                
                                
                                )
                            ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
                            ->leftJoin('locations','locations.id','=','candidate_details.location_id')
                            ->leftJoin('candidate_resume','candidate_resume.user_id','=','users.id')
                            ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')
                          
                            ->where('users.id',$request->id)->first(); 
  

                                                

        $resume_education = candidateEducationModel::where('user_id',$request->id)->get();                                        
        $resume_experience = candidateExperienceModel::where('user_id',$request->id)->get();                                        
        $resume_awards = candidateAwardModel::where('user_id',$request->id)->get();                                        
        $resume_skills = candidateSkillModel::where('user_id',$request->id)->get();                                        


        return view('website.candidate_details',compact('resume','resume_education','resume_experience','resume_awards','resume_skills'));


    }


    public function shortlistCandidate(Request $request){

        if(Auth::user()->role != "employer"){

            session()->flash('log_in_as_employer', 'Please Log in As an Employer');

            return redirect()->back();
        }else{

                $employer_shortlist_model = new EmployerShortlistCandidateModel;

                $check =  $employer_shortlist_model->where('employer_id',Auth::user()->id)->where('candidate_id',$request->candidate_id)->first();

                  if($check == null){

                    $employer_shortlist_model->employer_id = Auth::user()->id;
                    $employer_shortlist_model->candidate_id = $request->candidate_id;
                    $employer_shortlist_model->save();

                    if($employer_shortlist_model->id){
                        session()->flash('shortlist_added', 'Candidate has been added to the shortlist successfully');
                        return redirect()->back();
                    }

                  } else{

                   
                    if($check->delete()){
                        session()->flash('shortlist_remove', 'Candidate has been Remove the shortlist successfully');
                        return redirect()->back();
                    }

                  } 

        }
        
    }

}
