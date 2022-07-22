<?php

namespace App\Http\Controllers\admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job\JobTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobTypeController extends Controller
{
    
        
    public function index(){

        $job_type_data  = JobTypeModel::orderBy('created_at')->get();

        return view('admin.Job.job_type',compact('job_type_data'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [   
            'title' => 'required',
            'is_active' => "required"
                       
        ]);



        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                    if( isset($request->id)){
                        $job_type_model = JobTypeModel::find($request->id);
                    }else{

                        $job_type_model = new JobTypeModel;
                    }

                        $job_type_model->title =         ucwords( $request->input('title') );
                        $job_type_model->is_active =          $request->input('is_active');

                        $job_type_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);
                    
        } 
    }


    


    public function changeStatus($id){
        
        $data =  JobTypeModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(JobTypeModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }



    public function edit($id)
    {           

          $job_type_data = JobTypeModel::find($id);

           if($job_type_data){
            return response()->json(['status' => 200,'job_type_data' => $job_type_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $job_type_model =  JobTypeModel::find($id);
        

        if($job_type_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }



}
