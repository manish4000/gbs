@extends('website.layout')

@section('content')



<style>
    .related-job:hover{
        border: 1px solid rgba(233, 200, 13, 0.781);
    }
</style>

    @guest

        <div class="container">
            <p class=" py-3 px-4"  style="background-color: #faebcc91">The page is restricted only for register user.</p>
            <h3 class="my-5 text-center" >You need login to view this page</h3>

            <div>
                <hr class="mb-4">
            </div>
        </div>
    @endguest


    @auth


        <div class="container-fluid bg-light">

                <div class="container py-5">
                        <div class="row">
                                <div class="col-12 col-md-9 ">
                                    <div class="row">

                                        <div class="col-3">
                                            <div>
                                                <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" alt="" class="img-thumbnail">
                                            </div>
                                            <div class="text-center mt-2">

                                                <a href="{{route('jobs')}}" class="text-decoration-none text-muted">View all jobs <i class="fa-solid fa-arrow-right ms-3"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-6 my-auto">
                                            <div>
                                                
                                                <p class="fw-bold">{{$job_data->job_type}} </p>
                                                <span class="fs-4">{{$job_data->title}} </span>  <span> @if($job_data->is_feature == 1)  <i title="Feature" class="fa fa-star ms-2" style="color:#ffc107;"></i>  @endif  </span> 
                                                <p> Posted {{$job_data->created_at->diffForHumans()}}  </p>


                                            </div>
                                        </div>
                                        <div class="col-3"></div>

                                    </div>



                                </div>
                                <div class="col-12 col-md-3 ">
                                    @if (session()->has('log_in_as_candidate'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      {{ session('log_in_as_candidate') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>   
                                    @endif

                                    @if (session()->has('shortlist_job_added'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      {{ session('shortlist_job_added') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>   
                                    @endif
                                    @if (session()->has('shortlist_job_remove'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      {{ session('shortlist_job_remove') }}
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>   
                                    @endif



                                    {{-- <button type="submit" class="btn btn-warning   py-3  text-white px-5 mb-3">  Apply Now  <i class="fa-solid fa-arrow-right ms-3"></i></button>
                                    <button type="submit" class="btn btn-secondary   py-3  text-white px-5">   <i class="fa-regular fa-star"></i> ShortList  </button> --}}
                                    <div class="d-grid gap-3 col-12  mx-auto">
                                        <button class="btn btn-warning   py-3  text-white px-5 " data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Apply Now  <i class="fa-solid fa-arrow-right ms-2"></i> </button>
                                        {{-- <a href="" class="btn btn-warning   py-3  text-white px-5 " type="button"> <i class="fa-regular fa-star me-2 "></i>  ShortList </a> --}}

                                        <button type="button" class="shortlist_job btn btn-warning   py-3  text-white px-5 "  value="{{$job_data->id}}" >Shortlist</button>
                                    </div>

                                </div>
                        </div>

                </div>

        </div>

        <div class="container-fluid mb-5">
            <div class="container py-5 text-muted">
                <h4 class="text-dark mb-3">Job Description</h4>
                <div class="mb-3"> 
                    {!! $job_data->description !!}
                </div>
                <p><i class="fa-solid fa-location-dot"></i>  {{ $job_data->location}}</p>
                <p>Immediate joining will be preferred</p>
            </div>


            <div class="container">
                   <p class="fw-bold">Related Jobs</p> 

                   @foreach ($related_jobs as $job)
                   <div class="row ">
   
                       <div class="col-12 col-md-12 mb-3 related-job">
                           <div class="row shadow py-4 px-4" >
                               <div class="col-3 text-center">
                                   <div class=" ">
                                    <?php 
                                        
                                        if(file_exists(APP_PATH.JOB_FEATURE_IMAGE_URL.$job->feature_image)){

                                            $image_url = APP_PATH.JOB_FEATURE_IMAGE_URL.$job->feature_image;

                                            }else{
                                                $image_url = "https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png";
                                            }
                                        
                                    ?>
                                      <a href="{{route('job_details',$job->id)}}" class=" d-none d-md-inline"><img src="{{$image_url}}" alt="" height="120px" width="110" class="border d-none d-md-inline"></a>
                               </div>
                                  
                               </div>
                               <div class="col-6 my-auto text-start">
                                   <div>
                                       <p class="text-warning">{{$job->job_type}} </p>
                                        <a href="{{route('job_details',$job->id)}}" class="text-decoration-none text-reset"> <span class="fw-bold ">{{$job->title}}</span> <span>  </a> @if($job->is_feature == 1)  <i title="Feature" class="fa fa-star ms-2" style="color:#ffc107;"></i>  @endif  
                                       <p> <small> Posted {{$job->created_at->diffForHumans()}} </small> </p>
   
                                   </div>
                               </div>
                               <div class="col-3 my-auto">
                               
                                    <i class="fas fa-star fa-2x  text-warning" ></i>
                                 
                               
                                  
                               </div>
   
                           </div>
                       </div>
                      
                       
                   </div>
                       
                   @endforeach


            </div>



        </div>


        {{-- this is for modal box --}}

        <!-- Button trigger modal -->


  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Apply for this job</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
                <form action="{{route('job.apply')}}" method="POST" id="apply_job" >

                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="job_id" id="" value="{{$job_data->id}}">
                        <input type="text" class="form-control p-3" id="exampleFormControlInput1" placeholder="Enter Full Name" name="name">
                      </div>
                      <div class="mb-3">
        
                        <input type="email" class="form-control p-3" id="exampleFormControlInput1" placeholder="Email" name="email">
                        <span class="text-danger error-text email_error "></span>
                      </div>
                      <div class="mb-3">
                    
                        <input type="text" class="form-control p-3" id="exampleFormControlInput1" placeholder="Phone Number" name="phone">
                        <span class="text-danger error-text phone_error "></span>
                        
                      </div>
                      <div class="mb-3">
                     
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" name="message" rows="3"></textarea>
                        <span class="text-danger error-text message_error "></span>
                      </div>
                      <div class="mb-3">
                        <input class="form-control p-3" type="file" name="resume" id="formFile">

                        <span class="text-danger error-text resume_error "></span>
                      </div>

                      <div class="mb-3">
                        <input class="form-control btn btn-warning p-3 text-white" type="submit" id="formFile" value="Apply Job">
                      </div>
                      
                </form>
            </div>
       
          </div>
      </div>
   
      
    </div>
        {{-- end modal box --}}

    <script>
            
$(document).ready( function(){
      
      $("#apply_job").on('submit',function(e){

          e.preventDefault();

          $.ajax({

                 url:$(this).attr('action'),
             
                 method:$(this).attr('method'),
                 data:new FormData(this),
                 processData:false,
                 dataType:'json',
                 contentType:false,
                 beforeSend:function(){
                      $(document).find('span.error-text').text('')
                 },
                 success:function(data){

                      if(data.status == 401){
                          $.each(data.error,function(prefix,val){
                              $('span.'+prefix+'_error').text(val[0]);
                          });

                      }else if(data.status == 500){

                        Swal.fire(
                                    'Oops...',
                                     data.message,
                                    'error'
                            );
                      }else if(data.status == 200){

                        console.log(data);

                        $('#apply_job')[0].reset();

                        Swal.fire(
                                        'Good job!',
                                        data.message,
                                        'success'
                            ); 

                      window.location = "" 
                            
                      }

                 } 

          });

      });
  });



   
        $(document).on('click','.shortlist_job',function(e){

        e.preventDefault();

        let shortlist_job = $(this).val();

        console.log(shortlist_job);

        $.ajax({

        type:"GET",

        url:  "{{APP_PATH}}" + "jobs/shortlist/"+shortlist_job,


            success:function(response){


                console.log(response);

                if(response.status == 401){
                    
                    Swal.fire(      
                                            'Opps...',
                                            response.message,
                                            'error'
                                            
                        );
                }else if(response.status == 200){

                    
                    Swal.fire(      
                                            'Good Job',
                                            response.message,
                                            'success'
                                            
                        );

                }
                
            }

        });

        });



    </script>



    @endauth


@endsection