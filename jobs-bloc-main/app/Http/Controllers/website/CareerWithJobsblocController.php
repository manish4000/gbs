<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\CareerWithJobsblocModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerWithJobsblocController extends Controller
{   

    public function index(){
        return view('website.career_with_jobsbloc');
    }


    public function store(Request $request){

        $validator = Validator::make($request->all(),[   
            'name' => 'required|string',
            'email' => "required|email",
            "apply_for" => "required|string",
            "phone" => "required|numeric|digits_between:10,10",
            'resume' => "required|mimes:doc,docx,pdf|max:1524",  
            "message" => "required",
      
        ]);


        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                $career_with_jobsbloc_model = new CareerWithJobsblocModel;

                $career_with_jobsbloc_model->name = $request->name;
                $career_with_jobsbloc_model->email = $request->email;
                $career_with_jobsbloc_model->apply_for = $request->apply_for;
                $career_with_jobsbloc_model->phone = $request->phone;
                $career_with_jobsbloc_model->message = $request->message;

                if($request->hasFile('resume')){

                    $image =  $request->file('resume');
                    $extension = $image->getClientOriginalExtension();
                    $file_name = time().'.'.$extension;
                    $image->move(CAREER_WITH_JOBSBLOC_RESUME,$file_name);
                    $career_with_jobsbloc_model->resume = $file_name;
     }                       


                $career_with_jobsbloc_model->save();

                if($career_with_jobsbloc_model->id){
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
