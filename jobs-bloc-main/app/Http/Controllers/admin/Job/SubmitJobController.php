<?php

namespace App\Http\Controllers\admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job\JobCategoryModel;
use App\Models\Job\JobCategoryRelationModel;
use App\Models\Job\JobTypeModel;
use App\Models\Job\SalaryTypeModel;
use App\Models\JobModel;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class SubmitJobController extends Controller
{
    public function index(Request $request){

        

        $job_list  = JobModel::select('job.*','job_types.title as job_type_id','locations.title as location_id','salary_types.title as salary_type_id')
                                ->leftJoin('job_types','job.job_type_id','=','job_types.id')
                                ->leftJoin('locations','job.location_id','=','locations.id')
                                ->leftJoin('salary_types','job.salary_type_id','=','salary_types.id')
                                
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
            'description' => 'required',
            'feature_image' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
            'application_deadline_date' => 'required|date',
            'min_salary' => 'required|numeric',
            'max_salary' => 'required|numeric',
            'salary_type_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'address' => 'required',
            'is_active' => [
                'required',
                Rule::in(['0', '1']),
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
                            $job_model->location_id =          $request->input('location_id');
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



    public function edit($id)
    {           

        //   $job_data = JobModel::select('job.*','job_types.title as job_type_id','locations.title as location_id','salary_types.title as salary_type_id')
        //                                 ->leftJoin('job_types','job.job_type_id','=','job_types.id')
        //                                 ->leftJoin('locations','job.location_id','=','locations.id')
        //                                 ->leftJoin('salary_types','job.salary_type_id','=','salary_types.id')->find($id);


          $job_data = JobModel::find($id);
          $job_data->job_category_id  =  array_column(JobCategoryRelationModel::select('job_category_id')->where('job_id',$id)->get()->toArray(), 'job_category_id'); 
      

           if($job_data){
            return response()->json(['status' => 200,'job_data' => $job_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
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




}
