<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function store(Request $request){

        $validator = Validator::make($request->all(),[   
            'name' => 'required|string',
            'email' => "required|email",
            "subject" => "required|string",
            "message" => "required",
      
        ]);



        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                $contact_us_model = new ContactUsModel;

                $contact_us_model->name = $request->name;
                $contact_us_model->email = $request->email;
                $contact_us_model->subject = $request->subject;
                $contact_us_model->message = $request->message;

                $contact_us_model->save();

                if($contact_us_model->id){
                    return response()->json([
                        "status" => 200,
                        "message" => "Thank you for your message. It has been sent."
                    ]);
                }else{
                    return response()->json([
                        "status" => 500,
                        "message" => "OOps.. your message. Is  not sent."
                    ]);
                }

        }

    }
}
