@extends('website.layout')

@section('content')
 <!-- Shop Start -->
 <div class="container">
   
</div>
<!-- Shop End -->





<div class="container mt-5 mb-5">
   <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-4">

        <div class="accordion mt-4" id="accordionPanelsStayOpenExample ">
     
            <h2 class="accordion-header" id="job_category-headingOne">
                <a class="accordion-button text-decoration-none fs-5"  data-bs-toggle="collapse" data-bs-target="#job_category-collapseOne" aria-expanded="true" aria-controls="job_category-collapseOne">
                    Job Category
                </a>
            </h2>
            <div class="accordion-item border-0 mb-3" >  
            <div id="job_category-collapseOne" class="accordion-collapse collapse show" aria-labelledby="job_category-headingOne" >
                <div class="accordion-body" style="overflow:auto;height:180px">
                    
                    @if(count($job_categories) > 0)
                        @foreach($job_categories as $category)
                        
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="form-check"> 
                                        <input class="form-check-input p-2 bg-warning border-1 border-light text-warning job_category_id form_submit" name="job_category_id[]" type="checkbox" value="{{$category->id}}" id="job_category_id"  <?php   if(($candidate_category_checked != null) && in_array( $category->id,$candidate_category_checked)){ echo 'checked';} ?>> <label class="form-check-label" for="flexCheckChecked"> {{$category->title}} </label> 
                                    </div>
                                    <span>({{DB::table('users')->where('role','candidate')->where('job_category_id',$category->id)->count('id'); }})</span> 
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
                <div class="accordion-body" style="overflow:auto;height:180px">
                    
                

                @if(count($locations) > 0)   
                    @foreach($locations as $location)
                    
                            <div class="d-flex justify-content-between mt-2">
                                <div class="form-check">
                                     <input class="location_id form-check-input p-2 bg-warning border-1 border-light text-warning form_submit" name="location_id[]" type="checkbox" value="{{$location->id}}" <?php   if(($candidate_location_checked != null) && in_array( $location->id,$candidate_location_checked)){ echo 'checked';} ?>> <label class="form-check-label" for="flexCheckChecked"   > {{$location->title}} </label> </div>
                                <span>({{DB::table('candidate_details')->where('location_id',$location->id)->count('id'); }})</span> 
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
   

          <!-- Price Start -->
          {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by price</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="price-all">
                      <label class="custom-control-label" for="price-all">All Price</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-1">
                      <label class="custom-control-label" for="price-1">$0 - $100</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-2">
                      <label class="custom-control-label" for="price-2">$100 - $200</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-3">
                      <label class="custom-control-label" for="price-3">$200 - $300</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-4">
                      <label class="custom-control-label" for="price-4">$300 - $400</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="price-5">
                      <label class="custom-control-label" for="price-5">$400 - $500</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div>
          <!-- Price End -->
          
          <!-- Color Start -->
          <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by color</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="color-all">
                      <label class="custom-control-label" for="price-all">All Color</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-1">
                      <label class="custom-control-label" for="color-1">Black</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-2">
                      <label class="custom-control-label" for="color-2">White</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-3">
                      <label class="custom-control-label" for="color-3">Red</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-4">
                      <label class="custom-control-label" for="color-4">Blue</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="color-5">
                      <label class="custom-control-label" for="color-5">Green</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div>
          <!-- Color End -->

          <!-- Size Start -->
          <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by size</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="size-all">
                      <label class="custom-control-label" for="size-all">All Size</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-1">
                      <label class="custom-control-label" for="size-1">XS</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-2">
                      <label class="custom-control-label" for="size-2">S</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-3">
                      <label class="custom-control-label" for="size-3">M</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-4">
                      <label class="custom-control-label" for="size-4">L</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="size-5">
                      <label class="custom-control-label" for="size-5">XL</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div> --}}
          <!-- Size End -->
      </div>
      <!-- Shop Sidebar End -->


      <!-- Shop Product Start -->
      <div class="col-lg-9 col-md-8">
        
          <div class="row pb-3">
              <div class="col-12 pb-1">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <div>
                        <button type="submit" class="btn btn-warning   py-3  text-white  fw-bold px-5"> Get Candidate Alerts</button>
                      </div>
                      <div class="ml-2">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Latest</a>
                                  <a class="dropdown-item" href="#">Popularity</a>
                                  <a class="dropdown-item" href="#">Best Rating</a>
                              </div>
                          </div>
                          <div class="btn-group ml-2">
                              <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">10</a>
                                  <a class="dropdown-item" href="#">20</a>
                                  <a class="dropdown-item" href="#">30</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>

            @if(count($candidates) > 0)
                    
                @foreach ( $candidates as $candidate)
                
                <div class="col-12 col-lg-6 ">
                    <div class="product pt-5 shadow fade-in">

                            <div class="text-center">
                            
                            @if(isset($candidate->featured_image))  
       
                            <img src="{{CANDIDATE_FEATURE_IMAGE_URL}}{{$candidate->featured_image}}" height="120px" > 
                            @else
                            
                            <img src="{{APP_PATH.NO_IMAGE}}" height="120px" > 
                            @endif
                            
                            </div>
                            <div class="about text-center">
                             
                              @if($candidate->name == null) 
                              <h6 class="text-uppercase my-3">{{$candidate->email}}</h6>
                              @else

                              <h6 class="text-uppercase fw-bold">{{$candidate->name}}</h6>
                              @endif

                            @isset($candidate->location)
                            <div class="d-flex justify-content-between px-5 bg-light py-3">
                            <span class="text-danger ">Location</span>
                            
                            <span class="text-muted"> <i class="fa-solid text-danger fa-location-dot"></i> {{$candidate->location}}</span>
                            </div>  
                            @endisset
                                
                            @isset($candidate->job_category)
                            <div class="d-flex justify-content-between px-5  py-3">
                                <span class="text-danger ">Sector</span>
                                <span >
                                    <a href="#" class="text-decoration-none text-muted"" > {{$candidate->job_category}}</a>
                                </span>
                            </div>   
                            @endisset
                            </div>
                            
                            <div class="text-center py-3">
                            <a href="{{route('candidates.details',['name' => $candidate->name,'id' => $candidate->id])}}" class="btn btn-outline-warning rounded btn-block px-4 py-2" > View Profile </a>
                            </div>
                    </div>
                </div>
                @endforeach

                <div class="mt-5">
                    {{$candidates->links('pagination.custom')}}
                </div>
            @else
            <p class="text-center mt-3">No candidates found </p> 
            @endif


              {{-- <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                  <div class="product-item bg-light mb-4">
                      <div class="product-img position-relative overflow-hidden">
                          <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                          <div class="product-action">
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                          </div>
                      </div>
                      <div class="text-center py-4">
                          <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                          <div class="d-flex align-items-center justify-content-center mt-2">
                              <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                          </div>
                          <div class="d-flex align-items-center justify-content-center mb-1">
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small>(99)</small>
                          </div>
                      </div>
                  </div>
              </div> --}}
           
              <div class="col-12 mt-4 py-4" >
                  {{-- <nav>
                    <ul class="pagination justify-content-start">
                      <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav> --}}
              </div>
          </div>
      </div>
      <!-- Shop Product End -->
  </div>


</div>

<form class="row  text-center px-4" method="GET" action="{{route('candidates')}}" id="find_candidate">

    <div class="col-12 col-lg-5 mb-3 ">                       

    <input type="hidden" name="job_category" id="job_category" >
    <input type="hidden" name="job_location" id="job_location" >

    </div>
</form>  



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
        $("#find_candidate").submit();
    }

    

    


</script>



@endsection