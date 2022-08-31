@extends('website.layout')

@section('title') {{'Jobs search site | Find free job posting website online in India'}} @endsection


@section('content')

<style>
    .alert-card {
  box-shadow: 0 13px 10px rgb(0 0 0 / 0.2);
}
.alert-card:hover{
    box-shadow: 5px 6px 6px 2px #e9ecef;
    transform: scale(1.1);
}
</style>
<div class="container-fluid background">
    
    <!-- search section -->
    <div class="container">
    
            <h2 class="text-center text-uppercase text-info fw-bold my-5">EMPOWERING PEOPLE</h2>
    
            <div>
               
    
                <form class="row  text-center px-4" action="{{route('jobs')}}" method="GET">
                    <h2 class="fw-bold text-start mb-3">Search Jobs In Your Preferred Locations</h2>
                    <div class="col-12 col-lg-4 mb-3 ">                       
                        <input type="text"  name="title" class="form-control border-warning py-4 px-4" id="staticEmail2" placeholder="Job Title or Keyword">
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                    <select class="form-select border-warning py-4 px-5" name="job_location" aria-label="Default select example">
                    <option value="" >Open this select menu</option>

                        @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->title}}</option>
                            
                        @endforeach
                        
                    </select>                        
                    </div>
                    <div class=" d-grid  col-lg-2 text-start mb-3">
                        <button type="submit" class="btn bg-warning rounded-pill  btn-block  fw-bold "> Find Job </button>
                    </div>
           
              </form>  
    
                    <div class="my-3 px-4">
                        <span> <small> Trending Keywords:</small> </span>
                        
                        @foreach ( $job_types as $job_type)
                        <a href="#" class="text-decoration-none text-muted"> <small> {{ $job_type->title}} , </small></a>                            
                        @endforeach
                        
                        
                    </div>
    
            </div>
    
    </div>
    
    <!-- search section end  -->

    <!-- <div class="text-center">
        <img src="https://jobsbloc.com/wp-content/uploads/revslider/home-31/h3-slide-img-1.png" class="img-fluid" alt="">
        <img src="https://jobsbloc.com/wp-content/uploads/revslider/home-31/h3-slide-img-3.png" class="img-fluid" alt="">
        <img src="https://jobsbloc.com/wp-content/uploads/revslider/home-31/h3-slide-img-2.png" class="img-fluid" alt="">
        <img src="https://jobsbloc.com/wp-content/uploads/revslider/home-31/h3-slide-img-4.png" class="img-fluid" alt="">
        <img src="https://jobsbloc.com/wp-content/uploads/revslider/home-31/h3-slide-img-5.png" class="img-fluid" alt="">

    </div> -->
</div>

<!-- find online job -->

<div class="container">

    <div class="text-center mt-1 mb-5">
        
        <h3 class="fw-bold text-info">Find Free Online Jobs in India</h3>
        <h3 class="fw-bold text-info">How We Can Help You to find new job!</h3>
        <h5 class="fw-bold text-info">We make it as simple as a click.​</h5>

        
    

    </div>

    <div class="row text-center">

            <div class="col-6 col-md-3">

                <div class="p-2 ">
                  <i class="fa-brands fa-searchengin fa-4x  text-white bg-warning p-4" aria-hidden="true" style="border-radius: 35px 55px 35px 55px; "></i>
                  <p class="fw-bold mt-3">Advertise With Us</p>
                
                </div>
            
            </div>
            <div class="col-6 col-md-3">

                <div class="p-2 ">
                   
                  <i class="fa fa-4x fa-user-o bg-warning p-4 text-white" aria-hidden="true" style="border-radius: 35px 55px 35px 55px; "></i>
                  <p class="fw-bold mt-3">Stuck In Life</p>
                </div>
            
            </div>
            <div class="col-6 col-md-3">

                <div class="p-2 ">
                  <i class="fa-4x fa-solid fa-wallet bg-warning p-4 text-white" aria-hidden="true" style="border-radius: 35px 55px 35px 55px; "></i>
                  <p class="fw-bold mt-3">Wallet</p>
                </div>
            
            </div>
            <div class="col-6 col-md-3">

                <div class="p-2 ">
                   
                  <i class="fa-regular fa-file-lines fa-4x  bg-warning p-4 text-white" aria-hidden="true" style="border-radius: 35px 55px 35px 55px; "></i>
                  <p class="fw-bold mt-3">Post Job</p>
                </div>
            
            </div>
            
            
           

    </div>

</div>

<!-- find online job end  -->


<!-- alert -->

    <div class="container  " >

            <div class="row my-5 p-3 g-5">
                <h2 class="text-center">Create Your Free Alerts to get Instant Notifications </h2>

                <div class="col-12 col-md-6 ">
                    <div class="card alert-card border border mt-4 border-warning p-3  h-100">
                        <h4 class="text-center my-4">Candidate Alert</h4>
                        <div class="px-2">
                            <p>Post your free jobs and get instant applications into your account plus added notifications advantage of any new candidate added or updated in our database matching your search criteria. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 ">
                    <div class=" card alert-card border border mt-4  border-warning  p-3  h-100 ">
                        <h4 class="text-center my-4">Job Alert</h4>
                        <div class="px-2">
                            <p>Register for free and get instant notifications matching your search criteria for the job. </p>
                        </div>
                    </div>
                </div>
{{-- 
                <div class="col-12 col-md-6 mb-3"> <h2>Create Your Free Alerts to get Instant Notifications </h2></div>
                <div class="col-12 col-md-6  mb-3">
                    <div class="row">
                        <div class=" col-12 col-md-6 mb-3">
                        <button type="submit" class="btn btn-warning p-2  fw-bold  "> Create Job Alerts </button>
                        </div>
                        <div class="col-12 col-md-6 ">
                        <button type="submit" class="btn btn-warning  p-2  fw-bold ">Candidate Alerts </button>
                        </div>
                    </div>
                </div> --}}
            </div>

    </div>

<!-- alert end -->


<div class="container py-5 my-4 testmonial" >

    

    <div class="container why-choose-us-tab mb-5 shadow py-5 px-3">
        <!-- Nav tabs -->

        <h2 class="text-center my-5">Featured Jobs</h2>
     

            @if( count($featured_jobs) > 0 )
                    <div class="owl-carousel owl-theme">
                        @foreach($featured_jobs as $job)

                        <div class="item border" >
                            
                                <div class="p-3 ">

                                    <div class="row ">

                                        <div class="col-4 d-none d-md-inline my-auto">
                                            @if($job->feature_image == null)
                                            <img class="shadow-1-strong img-thumbnail" src="{{APP_PATH.NO_IMAGE}}" alt="avatar" style="width:100px; height:100px" />
                                            @else
                                            <img class="shadow-1-strong img-thumbnail" src="{{APP_PATH.JOB_FEATURE_IMAGE_URL}}{{$job->feature_image}}" alt="avatar" style="width:100px; height:100px" />
                                            @endif
                                        
                                        </div>
                                        <div class="col-8 text-start p-3">
                                            <p class="text-warning  p-0 m-0"><small>{{$job->job_type}}</small> </p>
                                            <p class="fw-bold p-0 m-0 "> <a class="text-decoration-none text-reset" href="{{route('job_details',$job->slug)}}" > {{$job->title}} </a> </p> 
                                            <p class="text-muted p-0 m-0"><small >{{$job->created_at->diffForHumans()}}</small></p>

                                        </div>
                                </div>
                                </div>
                            
                        </div>

                        @endforeach
                    </div>
           @else

                <h4 class="text-center">No Featured Jobs Available Right Now</h4>

           @endif
      

{{-- 
	    <div class="text-center">

                    <ul class="nav nav-pills d-flex justify-content-center"" id="myTab">
                        <li class="nav-item ">
                        <a class="nav-link active px-3 py-2 fs-5  mb-3 mb-lg-0 my-auto " data-bs-toggle="tab" href="#home"> 	<i class="fa  fa-tv "  > </i>  Development</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link px-3 py-2 fs-5 my-auto mb-3 mb-lg-0 " data-bs-toggle="tab" href="#menu1"> <i class="fa  fa-tv "  > </i> Web Marketing </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link px-3 py-2 fs-5 my-auto mb-3 mb-lg-0 " data-bs-toggle="tab" href="#menu2"> <i class="fa  fa-tv "  > </i>  Data Analytic</a>
                        </li>
                    </ul>
         </div>
                        
                        <!-- Tab panes -->
                        <div class="tab-content mt-5" id="myTabContent">

                            

                            <div class="tab-pane container active" id="home">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                        
                            </div>

                            <div class="tab-pane container fade" id="menu1">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">office staff </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                            <div class="tab-pane container fade" id="menu2">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">hr </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">hr </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="p-3 border">

                                            <div class="row ">

                                                <div class="col-4 d-none d-md-inline my-auto">
                                                <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                alt="avatar"
                                                style="width: 100px;" />
                                                </div>
                                                <div class="col-8 text-start p-3">
                                                    <p class="text-warning  p-0 m-0"><small>Full Time</small> </p>
                                                    <p class="fw-bold p-0 m-0"> <a href="#">hr </a> </p> 
                                                    <p class="text-muted p-0 m-0"><small >posted 2 days Ago</small></p>

                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                            </div>

                        </div> --}}

    </div>


<!-- Carousel wrapper -->
        {{-- <div
        id="carouselExampleControls"
        class="carousel slide text-center carousel-dark"
        data-mdb-ride="carousel">
        <div class="carousel-inner p-3">

       
                        <div class="carousel-item active">


                                <div class="row">
                                        
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="https://jobsbloc.com/images/logo.png"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold"> <a href="#">Commi 1 </a> </p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <a href="#"> <i class="fa fa-2x fa-user-o" aria-hidden="true"></i></a>  </span>
                                                        </div>

                                                  </div>


                                                </div>
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="http://dairy.novaexpress.in/uploads/website/testmonial/1649741461.jpg"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold">Commi 1</p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <i class="fa fa-2x fa-user-o" aria-hidden="true"></i> </span>
                                                        </div>

                                                  </div>


                                                </div>

                                                
                                </div>


                        </div>
                        <div class="carousel-item">


                                <div class="row">
                                        
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="http://dairy.novaexpress.in/uploads/website/testmonial/1649741461.jpg"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold">Commi 1</p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <i class="fa fa-2x fa-user-o" aria-hidden="true"></i> </span>
                                                        </div>

                                                  </div>


                                                </div>
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="http://dairy.novaexpress.in/uploads/website/testmonial/1649741461.jpg"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold">Commi 1</p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <i class="fa fa-2x fa-user-o" aria-hidden="true"></i> </span>
                                                        </div>

                                                  </div>


                                                </div>

                                                
                                </div>


                        </div>
                        <div class="carousel-item">


                                <div class="row">
                                        
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="http://dairy.novaexpress.in/uploads/website/testmonial/1649741461.jpg"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold">Commi 1</p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <i class="fa fa-2x fa-user-o" aria-hidden="true"></i> </span>
                                                        </div>

                                                  </div>


                                                </div>
                                             <div class="col-6 my-auto border">
                                                      
                                                  <div class="row ">

                                                        <div class="col-4 d-none d-md-inline my-auto">
                                                        <img class="shadow-1-strong img-thumbnail" src="http://dairy.novaexpress.in/uploads/website/testmonial/1649741461.jpg"
                                                        alt="avatar"
                                                        style="width: 170px;" />
                                                        </div>
                                                        <div class="col-6 text-start p-3">
                                                            <p class="text-warning"><small>Full Time</small> </p>
                                                            <p class="fw-bold">Commi 1</p> 
                                                            <p class="text-muted"><small >posted 2 days Ago</small></p>

                                                        </div>
                                                        <div class="col-2  my-auto text-start">
                                                            <span>   <i class="fa fa-2x fa-user-o" aria-hidden="true"></i> </span>
                                                        </div>

                                                  </div>


                                                </div>

                                                
                                </div>


                        </div>
                       
                       
                           
           
        </div>

        <button class="carousel-control-prev prev-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-warning" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next next-btn" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-warning" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div> --}}



</div>

<!-- testmonial slider  -->
<div class="container py-5 my-4 testmonial" >

<div class="text-center  py-3 mb-5 our-clint">

    <h3 class="display-6 ">What Our Customers Are Saying</h3>
</div>

       <!-- Carousel wrapper -->
<!-- Carousel wrapper -->
        <div
        id="carouselExampleControls-2"
        class="carousel slide text-center carousel-dark"
        data-mdb-ride="carousel">
        <div class="carousel-inner">

                @foreach ($testmonials as $key => $testmonial)
                
                    <div class="carousel-item  <?php echo ($key == 0)?'active':''; ?> ">
                            <img
                                class="rounded-circle shadow-1-strong mb-4"
                                src="{{WEBSITE_TESTMONIAL_IMAGE}}{{$testmonial->image}}"
                                alt="avatar"
                                style="width: 150px;"
                            />
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8">
                                <h5 class="mb-3">{{$testmonial->location}}</h5>
                                <p>{{$testmonial->description}}</p>
                                <p class="text-muted"> {{$testmonial->name}}</p>

                                @for($i = 0 ;$i < $testmonial->star; $i++ )

                                <span><img src="/images/star.png" alt="" height="25px"></span>
                                  
                                @endfor

                                <p> {{$testmonial->designation}}</p> 
                                </div>
                            </div>
                    </div>
                @endforeach
                        
     
           
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls-2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-warning" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls-2" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-warning" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>


          <div class="text-center mt-4">
            
              <button type="button" class="btn btn-warning text-white fw-bold py-2 px-3" >View More</button>
          </div>

</div>

<!-- end testmonial slider  -->


<div class="container">
        <h3 class="text-center text-info">Free Job Posting Sites for Employers in India</h3>
        
        <div class="mt-3 mb-5">
          <p>In the olden days when things or information was not so easily accessible most of the information we got through was print media and most of the procedures like hiring were time consuming even it was difficult to reach out to everyone ,but since things started taking shape online procedures became fast ,convenient and easy because of which we were able to find  online jobs in India  through job finding sites in India as a result the no of online job finding sites started increasing. Now people can search and apply for multiple jobs online as per their preference through job posting websites in India, even companies searching for candidates can choose from huge pool of candidate data through job posting sites online in India.Soon there was no dearth of i.t job websites in India.  We are one of the fastest upcoming job portal to find jobs online India which is searchable through online job website in India and job finding websites in India.</p>

          <p>Jobsbloc provides free job posting for employers in India which makes hiring easy and quick.</p>
          <p>Here job seekers can search multiple jobs free of cost and apply to as many jobs as they want thus making us approachable by everyone and making us the no.1 free job search site in India. In fact recruiters and H.R team prefer us because we provide free job posting site for employers in India.</p>
        </div>

        <hr class="fw-bold " style="height:3px;">
</div>
 

<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    dots:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
    
</script>

@endsection