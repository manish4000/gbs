<?php

namespace App\Http\Controllers\admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job\JobCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class JobCategory extends Controller
{
         
    public function index(){

        
        // $job_category_data = JobCategoryModel::select(['job_categories.id','job_categories.title','job_categories.parent_id','job_categories.order','job_categories.is_active','job_categories.is_featured', 'parent.title as parent_category'])->leftJoin('job_categories AS parent','job_categories.parent_id','=','parent.id')->paginate(15);
         $job_category_data = JobCategoryModel::paginate(15);

        $job_categories = JobCategoryModel::get();        

        return view('admin.job.Job_category',compact('job_category_data','job_categories'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[   
            'title' => 'required',
            'is_active' => "required",
            // "parent_id" => "nullable|integer",
            "order" => "required|integer",
            "is_featured" => "required",
      
        ]);



        if($validator->fails()){
            return response()->json(['status' => 401 ,'error' => $validator->errors()->toArray() ]);
        }else{

                    if( isset($request->id)){
                        $job_category_model = JobCategoryModel::find($request->id);
                    }else{

                        $job_category_model = new JobCategoryModel;
                    }

                        $job_category_model->title =      ucwords( $request->input('title') );
                        $job_category_model->is_active =  $request->input('is_active');
                        // $job_category_model->parent_id =  $request->input('parent_id');
                        $job_category_model->slug =     Str::slug($request->input('title'));
                        $job_category_model->order =  $request->input('order');
                        $job_category_model->is_featured =  $request->input('is_featured');



                        $job_category_model->save();


                        return response()->json(['status' => 200, "msg" => 'data inserted ']);
                    
        } 
    }

    // public function storecat(){

    //     $cat = ["Administration ","Agriculture","
    //     Dairy","
    //     Forestry","
    //     Fertilizer-pesticides","
    //     Air-conditioning","
    //     Airlines-aviation-aerospace","
    //     Animation","
    //     Apparel-garments-textile","
    //     Architecture-interior-design","
    //     Audit","
    //     Automotive-auto-ancillaries","
    //     Bio-technology-life-sciences","
    //     Banking-accounting-financial-services","
    //     Brewery-beverages-liquor","
    //     Business-development-training-solutions","
    //     Cement-concrete-readymix","
    //     Chemical","
    //     Consultant","
    //     Consumer-durables-fmcg","
    //     Content-writer-editor","
    //     Corporate-planning","
    //     Courier-freight-transportation","
    //     Customer-service","
    //     Defence","
    //     Delivery-services","
    //     Design-multimedia","
    //     Ecommerce","
    //     Education","
    //     Electrical-switchgears","
    //     Electronics-appliances","
    //     Engineering-mechanical-projects	","
    //     Engineering-procurement-construction","
    //     Entertainment-media-publishing","
    //     Environmental-service","
    //     Escalators-elevators","
    //     Event-management","
    //     Facility-management","
    //     Fertilizers","
    //     Film-tv","
    //     Financial-markets-services","
    //     Fishing","
    //     Fitness-trainer-Gym","
    //     Food-processing-packaged","
    //     Gems-jewellery","
    //     General-trading-import-export","
    //     Glass","
    //     Government-psu","
    //     Heat-ventilation-air-conditioning-hvac","
    //     Hospitals-healthcare-diagnostics","
    //     Hotels-restaurants-resorts","
    //     Industrial","
    //     Insurance-financial-services-stockbroking","
    //     Internet-e-commerce","
    //     Iiron-steel","
    //     Internet-service-provider","
    //     It-software","
    //     It-computers-hardware-networking","
    //     Ites-BPO","
    //     Journalism","
    //     kpo-research-analytics","
    //     law-enforcement-security-services","
    //     leather","
    //     legal-law-firm","
    //     lifestyle","
    //     livestock","
    //     logistics","
    //     Machinery-equipment-mfg","
    //     Maintenance","
    //     Management-consulting","
    //     Maritime-transportation","
    //     Market-research","
    //     Marketing","
    //     Materials","
    //     Metals-mining","
    //     Naval-architect","
    //     Ngo-social-services","
    //     Plastic-rubber","
    //     Power-energy","
    //     Oil-gas-petroleum","
    //     Printing-packaging","
    //     Procurement","
    //     Production-manufacturing","
    //     Public-relations-pr","
    //     Publishing","
    //     Quality-process-control","
    //     Real-estate","
    //     Recruitment-staffing-rpo","
    //     Research-development-scientist","
    //     Restaurant-food-service","
    //     Retail","
    //     Sales-business-development","
    //     Sanitary","
    //     Security","
    //     Shipping-marine-services","
    //     Social-media","
    //     Sugar","
    //     Supply-chain-management","
    //     Taxation","
    //     Teaching-education","
    //     Telecom","
    //     Textiles-yarn-fabrics-garments","
    //     Ticketing-reservation","
    //     Training","
    //     Travel-tourism"];



    //     $job_category_model = new JobCategoryModel;
        

    //     foreach($cat as $category){

    //         $data = [
    //             'title' => trim($category),
    //             'is_active' => '1',
    //             'slug' =>     Str::slug($category),
    //             'order' =>  '1',
    //             'is_featured' => 0
    //         ];
            
    //         $job_category_model->insert($data);
    //     }

    // }

    


    public function changefeatured($id){
        
        $data =  JobCategoryModel::select('is_featured')->where('id',$id)->first()->toArray();;

         $status =($data['is_featured'] == '1')?'0':'1';

       if(JobCategoryModel::where('id',$id)->update(['is_featured'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }

    public function changeStatus($id){
        
        $data =  JobCategoryModel::select('is_active')->where('id',$id)->first()->toArray();;

         $status =($data['is_active'] == '1')?'0':'1';

       if(JobCategoryModel::where('id',$id)->update(['is_active'=> $status ])){

         return   redirect()->back()->with('status_update','The status is updated');       

        }else{
            return   redirect()->back()->with('status_not_update', 'Oops.. somthing went wrong');    
        }  
        
    }



    public function edit($id)
    {           

          $job_category_data = JobCategoryModel::find($id);

           if($job_category_data){
            return response()->json(['status' => 200,'job_category_data' => $job_category_data]);
          
        }else{
            return response()->json(['status' => 404,'message' => " no data found"]);
        }
    }


    public function destroy($id)
    {   
           $job_category_model =  JobCategoryModel::find($id);
        

        if($job_category_model->delete()){

            return response()->json(['status' => 200,'message' => " deleted "]);

        }else{
            return response()->json(['status' => 500,'message' => "Somthing Went Wrong"]);
        }
    }

}
