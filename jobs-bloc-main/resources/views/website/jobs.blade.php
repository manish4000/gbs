@extends('website.layout')

@section('content')

<div class="container mt-5 mb-5">
   <div class="row g-2">
      <div class="col-md-3">
    
                <div class="accordion mt-4" id="accordionPanelsStayOpenExample ">

                    <div class="text-center mb-3">
                        <button class="btn btn-warning text-white" id="filter-data" >Apply Filter</button>
                    </div>

                        <h2 class="accordion-header" id="job_type-headingOne">
                            <a class="accordion-button text-decoration-none fs-5"  data-bs-toggle="collapse" data-bs-target="#job_type-collapseOne" aria-expanded="true" aria-controls="job_type-collapseOne">
                                Job Type
                            </a>
                        </h2>
                        <div class="accordion-item border-0" >  
                        <div id="job_type-collapseOne" class="accordion-collapse collapse show" aria-labelledby="job_type-headingOne" >
                            <div class="accordion-body" style="overflow:auto;height:150px">
                                <div  id="mainForm">

                                    @foreach($Job_types as $job_type)
                                    
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="form-check"> <input class="form-check-input p-2 bg-warning border-1 border-light text-warning job_type_id" name="job_type_id" type="radio" value="{{$job_type->id}}" id="job_type_id" > <label class="form-check-label" for="flexCheckChecked"> {{$job_type->title}} </label> </div>
                                                <span>44</span> 
                                            </div>
                                        
                                    @endforeach
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
                                
                                @foreach($job_categories as $category)
                                
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="form-check"> 
                                                <input class="form-check-input p-2 bg-warning border-1 border-light text-warning job_category_id form_submit" name="job_category_id[]" type="checkbox" value="{{$category->id}}" id="job_category_id" > <label class="form-check-label" for="flexCheckChecked"> {{$category->title}} </label> 
                                            </div>
                                            <span>44</span> 
                                        </div>
                                    
                                @endforeach

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
                                
                                @foreach($locations as $location)
                                
                                        <div class="d-flex justify-content-between mt-2">
                                            <div class="form-check">
                                                 <input class="location_id form-check-input p-2 bg-warning border-1 border-light text-warning" name="location_id[]" type="checkbox" value="{{$location->id}}" > <label class="form-check-label" for="flexCheckChecked"> {{$location->title}} </label> </div>
                                            <span>44</span> 
                                        </div>
                                    
                                @endforeach

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

            <div>
                <h3 class=" fw-bold text-center my-4">Online Free Job Search Websites in India</h3>
    
                <form class="row  text-center px-4" method="GET" action="{{route('jobs')}}" id="create_job">

                    <div class="col-12 col-lg-5 mb-3 ">                       
                      <input type="text" name="title"  class="form-control border-warning py-4 px-5" id="staticEmail2" value="Job Title or Keyword">
                      <input type="hidden" name="job_category" id="job_category" >
                      <input type="hidden" name="job_location" id="job_location" >
                      <input type="hidden" name="job_type" id="job_type" >
                    </div>

                    <div class="col-12 col-lg-5 mb-3">
                    <select class="form-select border-warning py-4 px-5" name="location" aria-label="Default select example">
                    <option selected>Location</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>                        
                    </div>
                    <div class=" d-grid  col-lg-2 text-start mb-3">
                        <button type="submit" class="btn btn-warning rounded-pill py-4 btn-large  btn-block  fw-bold px-3"> Search</button>
                    </div>
           
                </form>  
    
            </div>




                <p class="fs-5">Showing 1 – 6 of 825 results</p>

                <div class="mb-3">
                        <button type="submit" class="btn btn-warning   py-3  text-white  fw-bold px-5"> Get Job Alerts</button>
                    </div>

            <div class="row g-3">

            @foreach($jobs_data as $jobs)

                                <div class="col-12 shadow">
                                    <div class="product">

                                          <div class="d-flex d-flex justify-content-lg-between justify-content-md-between">

                                                <div class="">
                                                  {{-- <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" class="ps-2" >  --}}
                                                  <div class="p-2">
                                                      @if ($jobs->feature_image)
                                                      <img src="{{APP_PATH.JOB_FEATURE_IMAGE_URL}}{{$jobs->feature_image}}" alt="{{$jobs->title}}"  class="ps-2" height="110px" width="110px">
                                                      @else   
                                                      <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" alt="" class="">
                                                      @endif
                                                </div>
                                                </div>
                                                <div class="my-auto">

                                                   <a href="{{route('job_details',[ 'title' =>  $jobs->slug, 'id' => $jobs->id])}}" class="text-decoration-none text-reset pe-lg-3"> {{$jobs->title}} </a>    <span> @if($jobs->is_feature == 1)  <i class="fa fa-star ms-2" style="color:#ffc107;"></i>  @endif  </span>       

                                                </div>
                                          </div>           
                                        
                                    </div>
                                </div>

             @endforeach

            </div>
            </div>
        </div>


   </div>
</div>


<script>

    var job_category = [];
    var job_locations = [];

    
    $(".job_category_id").click(function(){

        var checkedBoxes = $('.job_category_id').val(); 

        $('.job_category_id').each(function (key, data) {

            if($(this).is(":checked")){
                job_category.push(data.value);
            }            
        });

        document.getElementById("job_category").value = job_category ;
        job_category = [];

    });

    
    $(".location_id").click(function(){

        var locations = $('.location_id').val(); 

        $('.location_id').each(function (key, data) {

            if($(this).is(":checked")){
                job_locations.push(data.value);
            }            
        });
        document.getElementById("job_location").value = job_locations ;

        job_locations = [];

    });

    $(".job_type_id").click(function(){

        var job_type = $('input[name="job_type_id"]:checked').val();

        console.log(job_type);

    });
    


    // function submitForm(){
    //     $("#create_job").submit();
    // }

    

    


</script>

@endsection