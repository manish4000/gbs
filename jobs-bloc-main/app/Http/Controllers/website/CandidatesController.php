<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\candidateAwardModel;
use App\Models\candidateEducationModel;
use App\Models\candidateExperienceModel;
use App\Models\candidateSkillModel;
use App\Models\EmployerShortlistCandidateModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatesController extends Controller
{
    public function index(){

        $candidates =   User::select('users.*','candidate_details.location_id','candidate_details.featured_image','locations.title as location','job_categories.title as job_category')
                                                ->leftJoin('candidate_details','candidate_details.user_id','=','users.id')
                                                ->leftJoin('locations','locations.id','=','candidate_details.location_id')
                                                ->leftJoin('job_categories','job_categories.id' ,'=' ,'users.job_category_id')
                                                ->where('role','candidate')->get(); 



                        

        return view('website.candidates',compact('candidates'));
    }


    public function candidateDetails(Request $request){

       

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
