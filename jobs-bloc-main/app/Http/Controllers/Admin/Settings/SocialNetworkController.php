<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\SocialNetworks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialNetworkController extends Controller
{
    
    public function index(){

        $social_networks_data  = SocialNetworks::orderBy('created_at')->get();

        return view('admin.settings.social_networks',compact('social_networks_data'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [   
            'title' => "required"         
        ]);



        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


                      $social_network_model = new SocialNetworks;

                        $social_network_model->title =          $request->input('title');
                 
                    

                        $social_network_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);



                    
        } 
    }


    


    public function changeStatus($id){
        
        $data =  SocialNetworks::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(SocialNetworks::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update', 'The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }



    public function edit($id)
    {           

          $social_network_data = SocialNetworks::find($id);

           if($social_network_data){
            return response()->json(['status' => 200,'social_network_data' => $social_network_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $testimonial_model =  SocialNetworks::find($id);


        if($testimonial_model->delete()){


            return response()->json(['status' => 200,'message' => "social Network deleted "]);

        }
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [   
         
            'title' => "required"
                    
        ]);

        if($validator->fails()){

            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);

        }else{


                       $social_network_model =SocialNetworks::find($request->id);

                       
                        $social_network_model->title = $request->title;
                      

                        if($social_network_model->save()){
                            
                            return response()->json(['status' => 200, "msg" => 'data inserted ']);
                        }else{

                            return response()->json(['status' => 500, "msg" => 'database error']);
                        }

                        
        } 

    }

}
