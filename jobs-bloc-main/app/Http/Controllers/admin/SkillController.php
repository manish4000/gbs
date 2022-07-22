<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SkillModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
     
    public function index(){

        $skill_data  = SkillModel::orderBy('created_at')->get();

        return view('admin.skill',compact('skill_data'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [   
            'title' => 'required|unique:skills,title,'.$request->id,
            'is_active' => "required"
                       
        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                    if( isset($request->id)){
                        $location_model = SkillModel::find($request->id);
                    }else{

                        $location_model = new SkillModel;
                    }

                        $location_model->title =          $request->input('title');
                        $location_model->is_active =          $request->input('is_active');

                        $location_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);
                    
        } 
    }


    


    public function changeStatus($id){
        
        $data =  SkillModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(SkillModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }


    public function edit($id)
    {           

          $skill_data = SkillModel::find($id);

           if($skill_data){
            return response()->json(['status' => 200,'skill_data' => $skill_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $location_model =  SkillModel::find($id);

        if($location_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }
}
