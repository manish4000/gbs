<?php

namespace App\Http\Controllers\admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\JobCategoryRelationModel;
use App\Models\Job\JobTypeModel;
use App\Models\Job\SalaryTypeModel;
use App\Models\JobLocationModel;
use App\Models\JobModel;
use App\Models\JobSkillModel;
use App\Models\LocationModel;
use App\Models\SkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class SubmitJobController extends Controller
{
    public function index(Request $request){

        

        $job_list  = JobModel::with('location.location_data')->select('job.*','job_types.title as job_type_id','salary_types.title as salary_type_id')
                                ->leftJoin('job_types','job.job_type_id','=','job_types.id')
                                // ->leftJoin('job_locations','job_locations.job_id','=','job.id')
                                // ->leftJoin('locations','job_locations.location_id','=','locations.id')
                                ->leftJoin('salary_types','job.salary_type_id','=','salary_types.id')->orderBy('job.created_at','DESC')
                                
                                ->get();

        $job_types =  JobTypeModel::get();

        $location = LocationModel::get();
        $job_categories = JobCategoryModel::get();
        $salary_type = SalaryTypeModel::get();

        return view('admin.job.submit_job',compact('job_types','location','salary_type','job_categories','job_list'));
    }



    public function store(Request $request)
    {
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
            'is_active' => [
                'required',
                Rule::in(['0', '1']),
            ],
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
                            // $job_model->location_id =          $request->input('location_id');
                            $job_model->address =          $request->input('address');
                        

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

                                return response()->json(['status' => 200, "msg" =>"your data is update"]); 
    
                            }else{
    
                                DB::rollback();
                                return response()->json(['status' => 500, "msg" =>"database error" ]); 
                            } 
    

        });

        }
    }



    public function changefeatured($id){
        
        $data =  JobModel::select('is_feature')->where('id',$id)->first()->toArray();;

         $status =($data['is_feature'] == '1')?'0':'1';

       if(JobModel::where('id',$id)->update(['is_feature'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }

    public function changeStatus($id){
        
        $data =  JobModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(JobModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }


    public function addNewJob(){

        $job_types =  JobTypeModel::get();
        $skills = SkillModel::get();
        $location = LocationModel::get();
        $job_categories = JobCategoryModel::get();
        $salary_type = SalaryTypeModel::get();

        return view('admin.job.add_new_job',compact('skills','job_types','location','salary_type','job_categories'));
    }


    public function viewJob($id){

        
        $job_data  = JobModel::select('job.*','job_types.title as job_type_id','salary_types.title as salary_type_id')
                                ->leftJoin('job_types','job.job_type_id','=','job_types.id')
                                // ->leftJoin('job_locations','job_locations.job_id','=','job.id')
                                // ->leftJoin('locations','job_locations.location_id','=','locations.id')
                                ->leftJoin('salary_types','job.salary_type_id','=','salary_types.id')
                                
                                ->where('job.id',$id)->first();

        $job_locations =  JobLocationModel::select('locations.title')->leftJoin('locations','locations.id','=','job_locations.location_id')->where('job_id',$id)->get();
        $job_categories = JobCategoryRelationModel::select('job_categories.title')->leftJoin('job_categories','job_categories.id' ,'=','job_categories_relation.job_category_id')->where('job_id',$id)->get();
       

        return view('admin.job.view_job',compact('job_categories','job_data','job_locations'));


    }


    public function edit($id)
    {           

        // $job_data  = JobModel::select('job.*','job_types.title as job_type_id','salary_types.title as salary_type_id')
        //                         ->leftJoin('job_types','job.job_type_id','=','job_types.id')
        //                         // ->leftJoin('job_locations','job_locations.job_id','=','job.id')
        //                         // ->leftJoin('locations','job_locations.location_id','=','locations.id')
        //                         ->leftJoin('salary_types','job.salary_type_id','=','salary_types.id')->where('job.id',$id)->first();


          $job_data = JobModel::find($id);
          $job_data->job_category_id  =  array_column(JobCategoryRelationModel::select('job_category_id')->where('job_id',$id)->get()->toArray(), 'job_category_id'); 
      

        //    if($job_data){
        //     return response()->json(['status' => 200,'job_data' => $job_data]);
          
        // }else{
        //     return response()->json(['status' => 404,'message' => " no data found"]);
        // }

        $job_types =  JobTypeModel::get();

        $location = LocationModel::get();
        $job_categories = JobCategoryModel::get();
        $salary_type = SalaryTypeModel::get();  


         $selected_job_categories = JobCategoryRelationModel::where('job_id',$id)->get()->toArray();  

         $selected_job_categories = array_column($selected_job_categories,'job_category_id');

         $selected_job_locations = JobLocationModel::where('job_id',$id)->get()->toArray();  

         $selected_job_locations = array_column($selected_job_locations,'location_id');


        return view('admin.job.edit_job',compact('job_data','job_types','location','selected_job_locations','selected_job_categories','salary_type','job_categories'));
    }


    public function destroy($id)
    {   
           $job_category_model =  JobModel::find($id);
        

        if($job_category_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }


    public function saveJob(){
        

     $array_data =    array(
            0 => array('Quality, Learning & Development Manager', '4', 'JW Marriott Bengaluru Prestige Golfshire Resort & Spa', '2023-04-10', 'null', 'null', '13', '51', '74', ''),
            1 => array('Human Resources Executive', '4', 'JW Marriott Bengaluru Prestige Golfshire Resort & Spa', '2023-04-10', 'null', 'null', '13', '51', '74', ''),
            2 => array('Sales Manager - Proactive/Reactive', '4', 'JW Marriott Bengaluru Prestige Golfshire Resort & Spa', '2023-04-10', 'null', 'null', '13', '51', '74', ''),
            3 => array('Guest Relations Manager', '4', 'JW Marriott Bengaluru Prestige Golfshire Resort & Spa', '2023-04-10', 'null', 'null', '13', '51', '74', ''),
            4 => array('Front Office Associates - Front Office', '4', 'Regenta Resort by Royal Orchid Hotels-Bhuj, Gujarat is looking for candidates for below mentioned vacancies', '2023-04-10', 'null', 'null', '13', '51', '2', 'hr.rbr@royalorchidhotels.com'),
            5 => array('Room Attendants - Housekeeping', '4', 'Regenta Resort by Royal Orchid Hotels-Bhuj, Gujarat is looking for candidates for below mentioned vacancies', '2023-04-10', 'null', 'null', '13', '51', '', 'hr.rbr@royalorchidhotels.com'),
            6 => array('Group Marketing Head', '4', 'Shalby Limited           Any MBA/PGDM - Marketing with 15+ years of experience', '2023-04-10', 'null', 'null', '13', '50', '', ''),
            7 => array('Training manager', '4', 'Greetings from The Park Bangalore..', '2023-04-10', 'null', 'null', '13', '51', '74', 'hrd.blr@theparkhotels.com'),
            8 => array('Assistant Manager - Loss Prevention (Assistant Security Manager)', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            9 => array('Spa Manager', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            10 => array('Spa Therapist', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            11 => array('Marcom Manager', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            12 => array('Sales Manager (Proactive / Reactive)', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            13 => array('Assistant Manager Sales (Proactive / Reactive)', '4', 'Looking for energetic & passionate hoteliers to join Sheraton Grand Bengaluru Whitefield Hotel & Convention Center in the following capacity:', '2023-04-10', 'null', 'null', '13', '51', '74', 'pradeep.ghorphade@marriott.com '),
            14 => array('Executive House keeper', '4', 'The Golkonda Resorts & Spa', '2023-04-10', 'null', 'null', '13', '51', '64', 'gm@golkondaresorts.com'),
            15 => array('Pastry Chef', '4', 'The Golkonda Resorts & Spa', '2023-04-10', 'null', 'null', '13', '51', '64', 'gm@golkondaresorts.com'),
            16 => array('Restaurant Manager', '4', 'The Golkonda Resorts & Spa', '2023-04-10', 'null', 'null', '13', '51', '64', 'gm@golkondaresorts.com'),
            17 => array('Bar Manager', '4', 'The Golkonda Resorts & Spa', '2023-04-10', 'null', 'null', '13', '51', '64', 'gm@golkondaresorts.com'),
            18 => array('Pastry Chef : Food & Beverage Production', '4', 'The Ananta Hotel is looking forward for below mentioned profile', '2023-04-10', 'null', 'null', '13', '51', '124', 'hrd.udaipur@anantahotels.com '),
        );


        
        foreach($array_data as $key=> $value){


            $job_model = new JobModel;
           
            
            $job_model->title = $value[0];
            $job_model->slug  = Str::slug( $value[0]);
            $job_model->job_type_id = $value[1];
            $job_model->description = $value[2];
            $job_model->application_deadline_date = $value[3];
            $job_model->min_salary = $value[4];
            $job_model->max_salary = $value[5];
            $job_model->salary_type_id = $value[6];
            $job_model->is_active = 1;
            $job_model->submit_by = 1;

            $job_model->save();

           $job_location =  new JobLocationModel;

           $job_location->job_id = $job_model->id;
           $job_location->location_id  =  $value[8];

            $job_location->save();

            $job_category_model = new JobCategoryRelationModel;

            $job_category_model->job_id = $job_model->id;
            $job_category_model->job_category_id   =  $value[7];

             $job_category_model->save();

        }
           
     
    }


    }





