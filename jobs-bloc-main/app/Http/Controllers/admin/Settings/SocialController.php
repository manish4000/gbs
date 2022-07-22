<?php

namespace App\Http\Controllers\admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\SocialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{

    public function index(){

           $social_data = SocialModel::where('id',1)->first();

        return view('admin.settings.social',compact('social_data'));
    }
  

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [   
            'id' => "required|integer",
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'twitter' => 'required|url',
            'linkedin' => 'required|url'
        ]);

        if($validator->fails()){

            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);

        }else{

               $social_model = SocialModel::find($request->id);

               $social_model->facebook = $request->facebook;
               $social_model->instagram = $request->instagram;
               $social_model->twitter = $request->twitter;
               $social_model->linkedin = $request->linkedin;
               
               if($social_model->save()){
                          return response()->json(['status' => 200, "msg" => 'data inserted ']);
               }else{
                         return response()->json(['status' => 500, "msg" => 'database error']);
               }

        }



    }




}
