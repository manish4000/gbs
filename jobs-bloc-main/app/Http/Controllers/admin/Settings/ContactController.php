<?php

namespace App\Http\Controllers\admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function index(){

        $contact_data =  ContactModel::where('id',1)->first();
        
        return view('admin.settings.contact',compact('contact_data'));
    }


    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [   
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',        
        ]);

        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{
            
                $contact_model =  ContactModel::find($request->id);

               $contact_model->email = $request->email;
               $contact_model->phone = $request->phone;
               $contact_model->address = $request->address;
               
               
               if($contact_model->save()){
                return response()->json(['status' => 200, "msg" => 'data inserted ']);
               }else{
                return response()->json(['status' => 500, "msg" => 'database error']);
               }

        }



    }

}
