<?php

namespace App\Http\Controllers\admin\user;

use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
         

    public function index(){
        $inquery_data = ContactUsModel::OrderBy('created_at','DESC')->get();

        return view('admin.user.contact_us',compact('inquery_data'));
    }

        public function view($id){

            $inquery_data = ContactUsModel::find($id);

            return response()->json(['data' => $inquery_data, 'status' => 200]);
        }


        public function destroy(Request $request)
        {
            if(ContactUsModel::where('id',$request->id)->delete()){
    
                return response()->json(['status' => 200,'message' => "Product deleted "]);
    
            }
        }


        public function changeStatus(Request $request){
        
            $data =  ContactUsModel::select('is_replied')->where('id',$request->id)->first()->toArray();;
    
             $status =($data['is_replied'] == '1')?'0':'1';
    
           if(ContactUsModel::where('id',$request->id)->update(['is_replied'=> $status ])){
    
            return response()->json(['status' => 200,'message' => "Status Change"]);      
    
            }else{
                return response()->json(['status' => 500,'message' => "status not Change "]);   
            }
            
        }


        public function replyMail(Request $request){


            $validator = Validator::make($request->all(), [   

                'email' => 'required',
                'message' => "required"

            ]);

            if($validator->fails()){

                return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
    
            }else{

                $details = [
                    'title' => 'Mail from Kamdhanu Dairy',
                    'body' => 'This is for testing email using smtp',
                    'message' => $request->message
                ];
               
                \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));
               

                return response()->json([ 'status' => 200,'message'=> 'email is Send']);

            }

            
        }   

}
