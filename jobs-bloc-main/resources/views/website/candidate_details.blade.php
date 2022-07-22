@extends('website.layout')

@section('content')


   <div class="container-fluid">

            <div class="container-fluid bg-light">
                    <div class="container py-5">
                            <div class="row">
                                    <div class="col-12 col-md-9 ">
                                        <div class="row">

                                            <div class="col-3 ">
                                                <div>
                                                    <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" alt="" height="160" class="rounded-circle img-fluid">
                                                </div>             
                                            </div>
                                            <div class="col-6 mt-3 mt-md-0 my-auto">
                                                <div>
                                                    <p class="fw-bold fs-4">{{$resume->name}} </p>
                                                    <p><small>Marketing jobs</small></p>
                                                    <p> <span> <i class="fa-solid text-warning fa-phone"></i> <small class="text-muted"> {{$resume->phone}}</small> </span> &ensp; <span> <i class="fa-solid text-warning fa-envelope"></i> <small class="text-muted"> {{$resume->email}}</small> </span> </p>
                                                    <p class=""> <i class="fa-solid  text-warning fa-location-dot"></i> <small> {{$resume->friendly_address}}  </small> </p>

                                                </div>
                                            </div>
                                            <div class="col-3"></div>

                                        </div>



                                    </div>
                                    <div class="col-12 col-md-3 ">
                                      @if (session()->has('log_in_as_employer'))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('log_in_as_employer') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>   
                                      @endif

                                      @if (session()->has('shortlist_added'))
                                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('shortlist_added') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>   
                                      @endif
                                      @if (session()->has('shortlist_remove'))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('shortlist_remove') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>   
                                      @endif
                                        {{-- <button type="submit" class="btn btn-warning   py-3  text-white px-5 mb-3">  Apply Now  <i class="fa-solid fa-arrow-right ms-3"></i></button>
                                        <button type="submit" class="btn btn-secondary   py-3  text-white px-5">   <i class="fa-regular fa-star"></i> ShortList  </button> --}}
                                        <div class="d-grid gap-3 col-12  mx-auto">

                                            <a href="{{route('shortlist_candidate',['candidate_id' => $resume->id])}}" class="btn btn-secondary   py-3  text-white px-5"> <i class="fa-regular fa-star me-2 "></i>  ShortList </a>
                                           <a href="{{CANDIDATE_CV_URL.$resume->cv}}"  class="btn btn-warning   py-3  text-white px-5" download>   Download CV  </a>
                                
                                            </button>
                                        </div>

                                    </div>
                            </div>

                    </div>

            </div>

        <div class="container">


            <div id="content">
              <ul id="tabs" class="nav nav-tabs py-3" data-tabs="tabs">
                <li class="active px-3 px-lg-5 py-2 "><a href="#description" class="text-decoration-none text-muted" data-toggle="tab">Description</a>
                </li>
                <li class="px-3 px-lg-5 py-2 "><a href="#education" class="text-decoration-none text-muted" data-toggle="tab">Education</a>
                </li>
                <li class="px-3 px-lg-5 py-2 "><a href="#experience" class="text-decoration-none text-muted" data-toggle="tab">Experience</a>
                </li>
                <li class="px-3 px-lg-5 py-2 "><a href="#portfolios" class="text-decoration-none text-muted" data-toggle="tab">Portfolios</a>
                </li>
                <li class="px-3 px-lg-5 py-2 "><a href="#skills" class="text-decoration-none text-muted" data-toggle="tab">Skills</a>
                </li>
                <li class="px-3 px-lg-5 py-2 "><a href="#awards" class="text-decoration-none text-muted" data-toggle="tab">Awards</a>
                </li>
              </ul>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div id="my-tab-content" class="tab-content">
                            <div class="row">
                                <div class="col-8"></div>
                                
                                <div class="col-2"></div>
                            </div>
                            {{-- this is for description --}}
                          <div class="tab-pane active" id="description">
                            <h5 class="py-3">About Me</h5>
                            {!! $resume->description!!}
                            
        
                           
                          </div>
                          {{-- end of description --}}

                          {{-- this is for education  --}}
                          <div class="tab-pane my-4" id="education">
                            @isset($resume_education)

                            <h5 class="mt-3">Education</h5>
                            
                            @foreach ($resume_education as $education)
                             
                            <div class="py-3 " >
                                <div class="ps-4 border-start border-warning border-3">

                                    <div class="row mb-2"> 
                                       <span><i class="fas fa-briefcase fa-x mb-1 mr-3 ml-3" aria-hidden="true"></i> <span class="fs-5 fw-bold"> {{$education->ed_title}}  </span>  </span>                      
                                      </div>
                                            
                                      <p class="mb-0 ml-1 light-grey-text mb-2"><i class="fa-solid fa-building"></i> {{$education->ed_academy}}   </p> 
                                      <p class="mb-0 ml-1 light-grey-text mb-2"><i class="fa-solid fa-calendar-days"></i> {{$education->ed_year}}   </p> 
                                      <p class="mb-0 ml-1 light-grey-text mb-2"> <i class="fa-solid fa-address-card"></i> {{$education->ex_description}}   </p> 
                                </div>
                            </div>
                                        
                            @endforeach  
                                                          
                         @endisset
                          </div>

                          {{-- end of education  --}}
                          {{-- this  is for experice --}}
                          <div class="tab-pane" id="experience">
                            @isset($resume_experience)

                                <h5 class="mt-3">Experience</h5>
                                
                                @foreach ($resume_experience as $experience)
                                 
                                <div class="py-3 " >
                                    <div class="ps-4 border-start border-warning border-3">

                                        <div class="row mb-2"> 
                                           <span><i class="fas fa-briefcase fa-x mb-1 mr-3 ml-3" aria-hidden="true"></i> <span class="fs-5 fw-bold"> {{$experience->ex_title}}  </span>  </span>                      
                                          </div>
                          
                                          <p class="font-weight-bold ml-1  mb-2"><i class="fa-solid fa-calendar-days"></i>  <small>  {{$experience->ex_start_date}}   -  {{$experience->ex_end_date}} </small> </p>
                          
                                          <p class="mb-0 ml-1 light-grey-text mb-2"><i class="fa-solid fa-building"></i> {{$experience->ex_company}}   </p> 
                                          <p class="mb-0 ml-1 light-grey-text mb-2"> <i class="fa-solid fa-address-card"></i> {{$experience->ex_description}}   </p> 
                                    </div>
                                </div>
                                            
                                @endforeach  
                                                              
                             @endisset
                         
                          </div>
                          {{-- this end is for experice --}}
                          <div class="tab-pane" id="portfolios">
                            <h5 class="my-3">Portfolios</h5>

                            <?php 

                                if(isset($resume->portfolio_photos)){
                                  
                                  $portfolio_photos = explode(',',$resume->portfolio_photos);

                                }else {
                                  $portfolio_photos = [];
                                }
                            
                            ?> 
                            
                            <div class="row row-cols-1 row-cols-md-2 g-4">

                              @foreach ($portfolio_photos as $key =>  $photo)
                              <div class="col">
                                <div class="card">
                                  <img src="{{CANDIDATE_PORTFOLIO_IMAGE_URL}}{{$photo}}" class="card-img-top img-thumbnail" alt="Hollywood Sign on The Hill"/>
                                  <div class="card-body">
                                    
                                  </div>
                                </div>
                              </div>
                                
                              @endforeach
                              
                            </div>


                         
                          </div>
                             {{-- this  is for skills  --}}
                          <div class="tab-pane" id="skills">

                            @isset($resume_skills)                                    
                            <h5 class="my-3">Skills</h5>
                            
                              @foreach ($resume_skills as $skills)
                              <div class="border-start border-warning border-3">
                                  <p class="fs-6 ms-3 mb-1">{{$skills->sk_title}}</p>
                                   <div class="progress ms-3">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $skills->sk_percentage ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>       

                              </div>
                              @endforeach  
                                                           
                                 @endisset
                   
                          </div>
                             {{-- this end of skills  --}}
                             {{-- this is for awards --}}
                          <div class="tab-pane" id="awards">

                            @isset($resume_awards)
                               
                            <h5 class="mt-3">Awards</h5>
                             
                            @foreach ($resume_awards as $award)
                                
                            <div class="py-3 " >
                                <div class="ps-4 border-start border-warning border-3">

                                    <div class="row mb-2"> 
                                       <span><i class="fa-solid  mx-3  fa-trophy"></i> <span class="fs-5fw-bold"> {{$award->aw_title}}  </span>  </span>                      
                                      </div>
                      
                                      <p class="font-weight-bold ml-1  mb-2"><i class="fa-solid mx-3 fa-calendar-days"></i>  <small>  {{$award->aw_year}} </small> </p>
                      
                                      <p class="mb-0 ml-1 light-grey-text mb-2"> <i class="fa-solid mx-3 fa-address-card"></i> {{$award->aw_description}}   </p> 
                                </div>
                            </div>
                                        @endforeach  
                                                              
                                @endisset
                   
                          </div>
                            {{-- this is end  for awards --}}
                        </div>
                    </div>
                    {{-- contact form --}}
                    <div class="col-12 col-lg-4 my-4">
                        <p class="text-uppercase fw-bold font-monospace">Contact {{$resume->name}} </p>
                        <form class="mt-4 border px-4 py-5 bg-light">
                            <!-- Email input -->
                            <div class="form-outline mb-3">
                              <input type="text" id="form1Example1" class="form-control p-2 rounded-0" placeholder="Subject" />
                            </div>
                            <div class="form-outline mb-3">
                              <input type="email" id="form1Example1" class="form-control p-2 rounded-0" placeholder="Email" />
                            </div>
                            <div class="form-outline mb-3">
                              <input type="text" id="form1Example1" class="form-control p-2 rounded-0" placeholder="Phone" />
                            </div>
                            <div class="form-outline mb-4">
                                <textarea class="form-control" id="form4Example3" placeholder="message" rows="4"></textarea>
                              
                             </div>
                          
                        
                            
                          
                            <!-- Submit button -->
                            <button type="button" class="btn btn-block btn-outline-warning">Send Now</button>

                            <p class="text-center p-3"><i class="fa-regular fa-hand-point-right" style="font-size: 20px"></i> <a href="" class="text-decoration-none text-danger"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button"> send Private message</a></p>
                          </form>
                    </div>
                </div>
            </div>
            
          </div>
        
        
        
    
  </div> 
          <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Send Message to "{{$resume->name}}"</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            
                <form action="#" method="POST" id="" >

                    @csrf
                    <div class="mb-3">
                        <input type="hidden" name="" id="" value="">
                        <input type="text" class="form-control p-3" id="exampleFormControlInput1" placeholder="Subject" name="name">
                    </div>
                     
                      <div class="mb-3">
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" name="message" rows="4"></textarea>
                        <span class="text-danger error-text message_error "></span>
                      </div>
                     

                      <div class="mb-3">
                        <input class="form-control btn btn-warning p-3 text-white" type="submit" id="formFile" value="send message">
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
          
          
              </script>    

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@endsection