<?php

namespace App\Http\Controllers\admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{

    public function index(){

        $testimonial_data  = TestimonialModel::orderBy('created_at')->get();

        return view('admin.settings.testimonial',compact('testimonial_data'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [   
            'designation' => 'required',
            'name' => "required",
            'description' => 'required', 
            'is_active' => 'required',
            'star' => 'required|numeric',
            'location' => 'required',
         'image' => "required|image|mimes:png,jpg,jpeg|max:1024",            
        ]);



        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{


                      $testimonial_model = new TestimonialModel;

                        $testimonial_model->name =          $request->input('name');
                        $testimonial_model->description =   $request->input('description');
                        $testimonial_model->is_active =     $request->input('is_active');
                        $testimonial_model->designation =     $request->input('designation');
                        $testimonial_model->location =     $request->input('location');
                        $testimonial_model->star =     $request->input('star');
                      
                       

                        if($request->hasFile('image')){

                                       $image =  $request->file('image');
                                       $extension = $image->getClientOriginalExtension();
                                       $file_name = time().'.'.$extension;
                                       $image->move(WEBSITE_TESTMONIAL_IMAGE,$file_name);
                                       $testimonial_model->image = $file_name;
                        }                       

                        $testimonial_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);



                    
        } 
    }


    


    public function changeStatus($id){
        
        $data =  TestimonialModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(TestimonialModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update', 'The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }



    public function edit($id)
    {           

          $testimonial_data = TestimonialModel::find($id);

           if($testimonial_data){
            return response()->json(['status' => 200,'testimonial_data' => $testimonial_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $testimonial_model =  TestimonialModel::find($id);

           $old_image_name = $testimonial_model->image;

        if($testimonial_model->delete()){

            if(file_exists(public_path(WEBSITE_TESTMONIAL_IMAGE.$old_image_name))){

                unlink (public_path(WEBSITE_TESTMONIAL_IMAGE.$old_image_name));
            }

            return response()->json(['status' => 200,'message' => "testmonial deleted "]);

        }
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [   
         
            'name' => "required",
            'description' => 'required', 
            'is_active' => 'required',
            'star' => 'required',
            'location' => 'required',
            'image' => 'sometimes|image|mimes:png,jpg,jpeg|max:1024',
                    
        ]);

        if($validator->fails()){

            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);

        }else{


                       $testimonial =TestimonialModel::find($request->id);

                       $old_image_name = $testimonial->image;
                       
                        $testimonial->name = $request->name;
                        $testimonial->description = $request->description;
                        $testimonial->is_active = $request->is_active;
               
                        $testimonial->designation = $request->designation;
                        $testimonial->location = $request->location;
                        $testimonial->star = $request->star;

                        if($request->hasFile('image')){
                                 
                                       $image =  $request->file('image');
                                       $extension = $image->getClientOriginalExtension();
                                       $file_name = time().'.'.$extension;

                                       $image->move(WEBSITE_TESTMONIAL_IMAGE,$file_name);

                                       $testimonial->image = $file_name;

                                       
                                if(file_exists(public_path(WEBSITE_TESTMONIAL_IMAGE.$old_image_name))){

                                    unlink (public_path(WEBSITE_TESTMONIAL_IMAGE.$old_image_name));
                                }

                        }                       

                        if($testimonial->save()){
                            
                            return response()->json(['status' => 200, "msg" => 'data inserted ']);
                        }else{

                            return response()->json(['status' => 500, "msg" => 'database error']);
                        }

                        
        } 

    }




}
