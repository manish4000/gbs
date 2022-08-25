@extends('website.layout')

@section('content')

<div class="container mt-5 mb-5">
   <div class="row g-2">
      <div class="col-md-3">
    
                <div class="accordion mt-4" id="accordionPanelsStayOpenExample ">

                        <h2 class="accordion-header" id="job_type-headingOne">
                            <a class="accordion-button text-decoration-none fs-5"  data-bs-toggle="collapse" data-bs-target="#job_type-collapseOne" aria-expanded="true" aria-controls="job_type-collapseOne">
                                Job Type
                            </a>
                        </h2>

                        <div class="accordion-item border-0" >  
                        <div id="job_type-collapseOne" class="accordion-collapse collapse show" aria-labelledby="job_type-headingOne" >
                            <div class="accordion-body" style="overflow:auto;height:150px">
                                <div  id="mainForm">

                                    @if(count($Job_types) > 0)
                                            @foreach($Job_types as $job_type)
                                            
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="form-check"> <input class="form-check-input p-2 bg-warning border-1 border-light text-warning job_type_id form_submit" name="job_type_id" type="radio" value="{{$job_type->id}}" id="job_type_id" <?php   if(($job_type_checked != null) && ( $job_type->id == $job_type_checked) ){ echo 'checked';} ?> > <label class="form-check-label" for="flexCheckChecked"> {{$job_type->title}} </label> </div>
                                                <span></span> 
                                            </div>
                                        
                                            @endforeach
                                    @else
                                           <p class="text-center"> Job Type Not Found</p>
                                    @endif

                                   
                                </div>

                            </div>
                        </div>
                        </div>

                        {{--  --}}

                        <h2 class="accordion-header" id="job_category-headingOne">
                            <a class="accordion-button text-decoration-none fs-5"  data-bs-toggle="collapse" data-bs-target="#job_category-collapseOne" aria-expanded="true" aria-controls="job_category-collapseOne">
                                Job Category
                            </a>
                        </h2>
                        <div class="accordion-item border-0" >  
                        <div id="job_category-collapseOne" class="accordion-collapse collapse show" aria-labelledby="job_category-headingOne" >
                            <div class="accordion-body" style="overflow:auto;height:150px">
                                
                                @if(count($job_categories) > 0)
                                    @foreach($job_categories as $category)
                                    
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="form-check"> 
                                                    <input class="form-check-input p-2 bg-warning border-1 border-light text-warning job_category_id form_submit" name="job_category_id[]" type="checkbox" value="{{$category->id}}" id="job_category_id"  <?php   if(($job_category_checked != null) && in_array( $category->id,$job_category_checked)){ echo 'checked';} ?>> <label class="form-check-label" for="flexCheckChecked"> {{$category->title}} </label> 
                                                </div>
                                                <span>({{DB::table('job_categories_relation')->where('job_category_id',$category->id)->count('job_id'); }})</span> 
                                            </div>
                                        
                                    @endforeach
                                @else
                                  <p class="text-center">   Job Categories Not Found</p>  

                                @endif


                                

                            </div>
                        </div>
                        </div>
                        {{--  --}}
                      

                        <h2 class="accordion-header" id="job_location-headingOne">
                            <a class="accordion-button text-decoration-none fs-5"  data-bs-toggle="collapse" data-bs-target="#job_location-collapseOne" aria-expanded="true" aria-controls="job_location-collapseOne">
                                Job Locations
                            </a>
                        </h2>
                        <div class="accordion-item border-0" >  
                        <div id="job_location-collapseOne" class="accordion-collapse collapse show" aria-labelledby="job_location-headingOne" >
                            <div class="accordion-body" style="overflow:auto;height:150px">
                                
                            

                            @if(count($locations) > 0)   
                                @foreach($locations as $location)
                                
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="form-check">
                                                 <input class="location_id form-check-input p-2 bg-warning border-1 border-light text-warning form_submit" name="location_id[]" type="checkbox" value="{{$location->id}}" <?php   if(($job_location_checked != null) && in_array( $location->id,$job_location_checked)){ echo 'checked';} ?>> <label class="form-check-label" for="flexCheckChecked"   > {{$location->title}} </label> </div>
                                            <span>({{DB::table('job_locations')->where('location_id',$location->id)->count('job_id'); }})</span> 
                                        </div>
                                    
                                @endforeach
                            @else
                                <p class="text-center">  Job Locations Not Found</p>  

                            @endif                
                            </div>
                        </div>
                        </div>
                        {{--  --}}
                    
                </div>
               

                    
                    
    </div>
             

    
      
        <div class="col-md-9" id="updateDiv">
         <!-- <div class="container  overflow-hidden">

       
            <div class="row  ">

                    @for($i=1;$i<=10;$i++)

                    <div class="col-md-6 border">
                    <div class="product py-4">
        
                        <div class="text-center"> <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" width="200"> </div>
                        <div class="about text-center">
                            <h5>Name</h5>
                            <span>$1,999.99</span> 
                        </div>
                        <div class=" d-grid mx-4 my-3 ">
                            <button type="submit" class="btn btn-warning rounded btn-large  text-white btn-block py-3 fw-bold px-5"> View Profile </button>
                        </div>
                    </div>
                    </div>

                    @endfor
            
             </div>
            </div>  -->

            <div class="container p-3">

                        <div class="border mb-3">
                            
                            <h3 class=" fw-bold text-center my-4">Online Free Job Search Websites in India</h3>

                            
                
                            <form class="row  text-center px-4" method="GET" action="{{route('jobs')}}" id="create_job">

                                <div class="col-12 col-lg-5 mb-3 ">                       
                                <input type="text" name="title"  class="form-control border-warning py-4 px-5" id="staticEmail2" placeholder="Job Title or Keyword">
                                <input type="hidden" name="job_category" id="job_category" >
                                <input type="hidden" name="job_location" id="job_location" >
                                <input type="hidden" name="job_type" id="job_type" >
                                </div>

                                <div class="col-12 col-lg-5 mb-3">
                                <select class="form-select border-warning py-4 px-5" name="location" aria-label="Default select example">
                                <option value="">Select Location</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}"> {{$location->title}} </option>                                                                                
                                            @endforeach                           
                                </select>                        
                                </div>
                                <div class=" d-grid  col-lg-2 text-start mb-3">
                                    <button type="submit" class="btn btn-warning rounded-pill py-4 btn-large  btn-block  fw-bold px-3"> Search</button>
                                </div>
                    
                            </form>  
                
                        </div>




            <div class="row g-3">

            @if(count($jobs_data) > 0 )


                @foreach($jobs_data as $jobs)

                                    <div class="col-12 col-lg-6 ">
                                        <div class="product shadow">

                                            <div class="d-flex  justify-content-between">

                                                   
                                                    <div class="p-2">
                                                        <a href="{{route('job_details',$jobs->slug)}}">
                                                        @if ($jobs->feature_image)
                                                        <img src="{{APP_PATH.JOB_FEATURE_IMAGE_URL}}{{$jobs->feature_image}}" alt="{{$jobs->title}}"  class="ps-2" height="80px" width="80px">
                                                        @else   
                                                        <img src="{{APP_PATH.NO_IMAGE}}" alt="" height="80px" width="80px"  class="">
                                                        @endif
                                                    </a>
                                                    </div>
                                                   
                                                    <div class="my-auto">
                                                        <div class="me-3">
                                                            <a href="{{route('job_details',$jobs->slug)}}" class="text-decoration-none text-reset fw-bold "> {{$jobs->title}} </a>    <span> @if($jobs->is_feature == 1)  <i class="fa fa-star ms-2" style="color:#ffc107;"></i>  @endif  </span>       
                                                        </div>
                                                    </div>
                                            </div>           
                                        </div>
                                    </div>

                @endforeach

             @else
                        <div class="my-3 py-4">
                            <h5 class="text-center">Job Not Found </h5>
                        </div>        
             
             @endif

            </div>
                <div class="mt-5">
                    {{$jobs_data->links("pagination.custom")}}

                </div>
            </div>
        </div>


   </div>
</div>


<script>

    var job_category = [];
    var job_locations = [];

    
    $(".form_submit").click(function(){

        var checkedBoxes = $('.job_category_id').val(); 

        $('.job_category_id').each(function (key, data) {

            if($(this).is(":checked")){
                job_category.push(data.value);
            }            
        });

        document.getElementById("job_category").value = job_category ;

        
        var locations = $('.location_id').val(); 

        $('.location_id').each(function (key, data) {

            if($(this).is(":checked")){
                job_locations.push(data.value);
            }            
        });
        document.getElementById("job_location").value = job_locations ;

        var job_type = $('input[name="job_type_id"]:checked').val();

        document.getElementById("job_type").value = job_type ;
        
        submitForm();

    });

    
    // $(".location_id").click(function(){

    //     var locations = $('.location_id').val(); 

    //     $('.location_id').each(function (key, data) {

    //         if($(this).is(":checked")){
    //             job_locations.push(data.value);
    //         }            
    //     });
    //     document.getElementById("job_location").value = job_locations ;

        
    //     submitForm();

    // });

    // $(".job_type_id").click(function(){

    //     var job_type = $('input[name="job_type_id"]:checked').val();

    //     document.getElementById("job_type").value = job_type ;

    //     submitForm();
    // });
    


    function submitForm(){
        $("#create_job").submit();
    }

    

    


</script>

@endsection