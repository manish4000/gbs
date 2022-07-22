<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    
    public function index(){

        $location_data  = LocationModel::orderBy('created_at')->get();

        return view('admin.location',compact('location_data'));

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
                        $location_model = LocationModel::find($request->id);
                    }else{

                        $location_model = new LocationModel;
                    }

                        $location_model->title =          $request->input('title');
                        $location_model->is_active =          $request->input('is_active');

                        $location_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);
                    
        } 
    }


    


    public function changeStatus($id){
        
        $data =  LocationModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(LocationModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }



    public function edit($id)
    {           

          $location_data = LocationModel::find($id);

           if($location_data){
            return response()->json(['status' => 200,'location_data' => $location_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $location_model =  LocationModel::find($id);

           $old_image_name = $location_model->image;

        if($location_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }



}
