<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobLocationModel;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
                        $location_model->slug =       Str::slug($request->title);  ; 
                        $location_model->is_active =          $request->input('is_active');

                        $location_model->save();

                        return response()->json(['status' => 200, "msg" => 'data inserted ']);
                    
        } 
    }


    
    public function st(){

        $data = [
            "Uttar pradesh","
Gujarat","
Rajasthan","
Maharashtra","
Punjab","
andhra Pradesh","
Assam","
West bengal","
andman-and-nicobar-island","
Karnataka","
Chattisgarh","
Odisha","
bahrain","
Bihar","
Delhi","
Delhi NCR","
Haryana","
Jharkhand","
Chandigarh","
chennai","
Tamil Nadu","
Uttrakhand ","
Doha","
Dubai","
Goa","
Madhya Pradesh","
Himachal Pradesh","
Telangana","
Indore","
Kerala","
Kuwait","
London","
Los Angeles","
Mumbai","
Manchester","
New york","
Pan India","
Qatar","
Saudi arabia","
Sikkim","
Singapore","
Srilanka","
Jammu & Kashmir","
Tripura","
U.S","Agra","
Ahmedabad","
ajmer","
amravati","
Amritsar","
guntur","
Guwahati","
Asansol","
Belgaun","
Bhilai","
bhubaneswar","
Patna","
Faridabad","
Bokaro steelcity","
coimbatore","
Dehradun","
Gwalior","
Hamirpur","
Hyderabad","
Kannur","
mahabaleswar","
aligarh","
Bhavnagar","
Bikaner","
Aurangabad","
Jalandhar","
Kakinada","
durgapur","
Bengaluru","
Bilaspur","
Cuttack","
gurgaon","
Dhanbad","
Erode","
mussoorie","
Jabalpur","
shimla","
warangal","
Kochi","
allahabad","
Jamnagar","
Jaipur","
Bhiwandi","
Ludhiana","
Kurnool","
Kolkata","
Bijapur","
Raipur","
rourkela","
Jamshedpur","
Madurai","
rishikesh","
Bhopal","
Kollam","
Bareilly","
rajkot","
Jodhpur","
Karjat","
Mohali","
nellore","
purulia","
gulbarga","
ranchi","
pondicherry","
sihora","
Kottayam","
firozabad","
surat","
Kota","
Kolhapur","
rajahmundry","
siliguri","
Hublii","
salem","
ujjain","
kozhikode","
Gaziabad","
vadodara","
udaipur","
nagpur","
tirupati","
mangalore","
tiruchirappalli","
malappuram","
Gorakhpur","
nanded","
Vijayawada","
mysore","
tirunelveli","
palakkad","
Jhansi","
nashik","
vishakhapatnam","
tiruppur","
thiruvananthapuram","
Kanpur","
navi mumbai","
tiruppur","
thrissur","
Lucknow","
pune","
tiruvannamalai",
"tirur","
mathura","
solapur","
meerut","
vellore","
moradabad","
Noida","
Varanasi"   ];


        $job_category_model = new LocationModel();
        

        foreach($data as $category){

            $data = [
                'title' => trim($category),
                'is_active' => '1',
                'slug' =>     Str::slug($category),
                
            ];
            
            $job_category_model->insert($data);
        }

    }


    public function changeStatus($id){
        
        $data =  LocationModel::select('is_active')->where('id',$id)->first()->toArray();

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
