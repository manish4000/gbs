<?php

namespace App\Http\Controllers\website\candidate;

use App\Http\Controllers\Controller;
use App\Models\candidateAwardModel;
use App\Models\candidateEducationModel;
use App\Models\candidateExperienceModel;
use App\Models\candidateSkillModel;
use App\Models\ResumeModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResumeController extends Controller
{
    public function index(){   

        $user_id =  Auth::user()->id;

        $resume_details =  ResumeModel::where('user_id',$user_id)->first();
        $candidate_education = candidateEducationModel::where('user_id',$user_id)->get();
        $candidate_experience = candidateExperienceModel::where('user_id',$user_id)->get();
        $candidate_award = candidateAwardModel::where('user_id',$user_id)->get();
        $candidate_skill = candidateSkillModel::where('user_id',$user_id)->get();

        return view('website.candidate.resume',compact('resume_details','candidate_education','candidate_experience','candidate_award','candidate_skill'));
    }

    public function updateResume(Request $request){


            // return response($request->all());
          $validator = Validator::make($request->all(), [              
            'portfolio_photos.*' => 'nullable|image|mimes:png,jpg,jpeg|max:524' ,
            'cv' => 'nullable|mimes:pdf,docx,doc' ,    
        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


            return DB::transaction( function() use ($request){

                    $user_id = Auth::user()->id;
                   
                    //this part for save candidate education saving 


                        $candidate_education = new candidateEducationModel();

                        $candidate_education->where('user_id',$user_id)->delete();

                        $ed_title =  $request->ed_title;
                        $ed_academy =  $request->ed_academy;
                        $ed_year =  $request->ed_year;
                        $ed_description =  $request->ed_description;
                        
                        $ed_loop_time = ($ed_title == null)? 0 : count($ed_title);

                       for($i =0 ;$i < $ed_loop_time; $i++ ){

                         $education = [
                          'user_id' => $user_id ,
                          'ed_title' => $ed_title[$i],
                          'ed_academy' => $ed_academy[$i],
                          'ed_year' => $ed_year[$i],
                          'ed_description' => $ed_description[$i]
                         ];

                         $candidate_education->insert($education);

                         $education = [];

                       }

                    //this part for save candidate Experience saving 


                        $candidate_experience = new candidateExperienceModel();

                        $candidate_experience->where('user_id',$user_id)->delete();

                        $ex_title =  $request->ex_title;
                        $ex_start_date =  $request->ex_start_date;
                        $ex_end_date =  $request->ex_end_date;
                        $ex_company =  $request->ex_company;
                        $ex_description =  $request->ex_description;

                        $ex_loop_time = ($ex_title == null)? 0 : count($ex_title);

                       for($i =0 ;$i < $ex_loop_time; $i++ ){

                         $experience = [
                          'user_id' => $user_id ,
                          'ex_title' => $ex_title[$i],
                          'ex_start_date' => $ex_start_date[$i],
                          'ex_end_date' => $ex_end_date[$i],
                          'ex_company' => $ex_company[$i],
                          'ex_description' => $ex_description[$i],
                         ];

                         $candidate_experience->insert($experience);
                         $experience = [];

                       }

                    //this part for save candidate Awards saving 


                        $candidate_award = new candidateAwardModel();

                        $candidate_award->where('user_id',$user_id)->delete();

                        $aw_title =  $request->aw_title;
                        $aw_year =  $request->aw_year;
                        $aw_description =  $request->aw_description;
                        

                        $ex_loop_time = ($aw_title == null)? 0 : count($aw_title);

                       for($i =0 ;$i < $ex_loop_time; $i++ ){

                         $award = [
                          'user_id' => $user_id ,
                          'aw_title' => $aw_title[$i],
                          'aw_year' => $aw_year[$i],
                          'aw_description' => $aw_description[$i],
                         ];

                         $candidate_award->insert($award);
                         $award = [];

                       }
                    //this part for save candidate Skills  saving 


                        $candidate_skill = new candidateSkillModel();

                        $candidate_skill->where('user_id',$user_id)->delete();

                        $sk_title =  $request->sk_title;
                        $sk_percentage =  $request->sk_percentage;
                    
                        

                        $ex_loop_time = ($sk_title == null)? 0 : count($sk_title);

                       for($i =0 ;$i < $ex_loop_time; $i++ ){

                         $skill = [
                          'user_id' => $user_id ,
                          'sk_title' => $sk_title[$i],
                          'sk_percentage' => $sk_percentage[$i],
                         ];

                         $candidate_skill->insert($skill);
                         $skill = [];

                       }


                    //check data is already exist or not 
                        $check_data =  ResumeModel::where('user_id',$user_id)->first();

                        if($check_data == null){
                            $candidate_resume = new ResumeModel();
                        }else{

                            $candidate_resume  = ResumeModel::where('user_id',$user_id)->first();
                        }
                                            
                        $candidate_resume->user_id =  $user_id;
                        

                        

                        if($request->hasFile('portfolio_photos')){

                            $portfolio_photos = [];  
                            
                            foreach($request->file('portfolio_photos') as $key => $image)
                                {
                                    $portfolio =  $request->file('portfolio_photos');

                                    $extension = $image->getClientOriginalExtension();
                                    $file_name = 'candidate-portfolio'.time().'.'.$extension;
                                    $image->move(CANDIDATE_PORTFOLIO_IMAGE_URL,$file_name);

                                    array_push($portfolio_photos, $file_name);

                                }
                            
                                $candidate_resume->portfolio_photos =  implode(',',$portfolio_photos);
                        }



                        if($request->hasFile('cv')){
                            
                                    $cv =  $request->file('cv');
                                    $extension = $cv->getClientOriginalExtension();
                                    $file_name = 'candidate-cv'.time().'.'.$extension;
                                    $cv->move(CANDIDATE_CV_URL,$file_name);

                                    $candidate_resume->cv = $file_name;

                        }

                        

                        if($candidate_resume->save()){

                            return response()->json(['status' => 200, "msg" =>"your data is update " ]); 

                        }else{

                            DB::rollback();
                            return response()->json(['status' => 500, "msg" =>"database error" ]); 
                        } 

           
    });

    }
}
}
