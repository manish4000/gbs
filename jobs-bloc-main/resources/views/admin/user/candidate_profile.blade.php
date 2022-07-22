@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Candidate Profile')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Candidates </a> <i class="fa-solid fa-caret-right"></i></</li>
      <li><a href="#" class="text-decoration-none text-reset ms-1">Profile </a></li>
    </ol>

    @if (\Session::has('status_update'))
   
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Status Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if (\Session::has('status_not_update'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Status not Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    
   <div class="container-fluid bg-light">

    <div class="container-fluid ">
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
                                            <p class=""> <i class="fa-solid  text-warning fa-location-dot"></i> <small>  {{$resume->location}} , {{$resume->friendly_address}}  </small> </p>

                                        </div>
                                    </div>
                                    <div class="col-3"></div>

                                </div>

                            </div>
                            <div class="col-12 col-md-3 ">
                           
                                {{-- <button type="submit" class="btn btn-warning   py-3  text-white px-5 mb-3">  Apply Now  <i class="fa-solid fa-arrow-right ms-3"></i></button>
                                <button type="submit" class="btn btn-secondary   py-3  text-white px-5">   <i class="fa-regular fa-star"></i> ShortList  </button> --}}
                                <div class="d-grid gap-3 col-12  mx-auto">

                                   <a href="{{CANDIDATE_CV_URL.$resume->cv}}"  class="btn btn-warning   py-3  text-white px-5" download>   Download CV  </a>
                        
                                    </button>
                                </div>

                            </div>
                    </div>

            </div>

    </div>

</div> 

<div class="container-fluid bg-white pb-3">


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
      <li class="px-3 px-lg-5 py-2 "><a href="#social" class="text-decoration-none text-muted" data-toggle="tab">Social</a>
      </li>
    </ul>
  </div>
  <div class="container mb-5">
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
                   
                  <div class="py-3">
                      <div class="ps-4" style="border-left-style: solid ; padding-left:12px" >

                          <div class="row mb-2"> 
                             <span> <i title="Education Title" class="fa-solid fa-briefcase mb-1 mr-3 ml-3"></i> <span class="fs-5 fw-bold"> {{$education->ed_title}}  </span>  </span>                      
                            </div>
                                  
                            <p class="mb-0 ml-1 light-grey-text mb-2"><i title="Education Academy"  class="fa-solid fa-building  mr-3"></i> {{$education->ed_academy}}   </p> 
                            <p class="mb-0 ml-1 light-grey-text mb-2"><i title="Education Year"  class="fa-solid fa-calendar-days mr-3"></i> {{$education->ed_year}}   </p> 
                            <p class="mb-0 ml-1 light-grey-text mb-2"> <i title="Education Description"  class="fa-solid fa-address-card mr-3"></i> {{$education->ex_description}}   </p> 
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
                          <div class="ps-4" style="border-left-style: solid ; padding-left:12px">

                              <div class="row mb-2"> 
                                 <span><i class="fa-solid fa-briefcase  mb-1 mr-3 ml-3" title="Experience Title"  aria-hidden="true"></i> <span class="fs-5 fw-bold"> {{$experience->ex_title}}  </span>  </span>                      
                                </div>
                
                                <p class="font-weight-bold ml-1  mb-2"><i class="fa-solid fa-calendar-days" title="Start Date to End Date" ></i>  <small>  {{$experience->ex_start_date}}   -  {{$experience->ex_end_date}} </small> </p>
                
                                <p class="mb-0 ml-1 light-grey-text mb-2"><i class="fa-solid fa-building" title="company" ></i> {{$experience->ex_company}}   </p> 
                                <p class="mb-0 ml-1 light-grey-text mb-2"> <i class="fa-solid fa-address-card" title="Description" ></i> {{$experience->ex_description}}   </p> 
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
                      
                              <div class="py-3 ">
                                  <div class="ps-4"  style="border-left-style: solid ; padding-left:12px">

                                      <div class="row mb-2"> 
                                          <p><span><i class="fa-solid  ml-3  fa-trophy" title="Award Title"></i> <span class="fs-5 fw-bold" > {{$award->aw_title}}  </span>  </span>  </p>                   
                                      </div>
                      
                                      <p class="font-weight-bold ml-1  mb-2"><i class="fa-solid mx-3 fa-calendar-days" title="Award Year" ></i>  <small>  {{$award->aw_year}} </small> </p>
                      
                                      <p class="mb-0 ml-1 light-grey-text mb-2"> <i class="fa-solid mx-3 fa-address-card" title="Award Description" ></i> {{$award->aw_description}}   </p> 
                                  </div>
                              </div>
                              @endforeach  
                                                    
                      @endisset
         
                </div>
                  {{-- this is end  for awards --}}
                   {{-- this is for social --}}
                <div class="tab-pane" id="social">

                  @isset($resume_social)
                     
                  <h5 class="mt-3">Social</h5>
                   
                      @foreach ($resume_social as $social)

                      <div class="row mb-2">
                        <div class="col-4">{{$social->title}} : </div>
                        <div class="col-8"> <a href="{{$social->url}}" target="_blank"> {{$social->url}}</a>  </div>
                      </div>
                    @endforeach
                                                    
                    @endisset
         
                </div>
                  {{-- this is end  for social --}}
              </div>
          </div>
        
      </div>
  </div>
  
</div>

  </div>
</div>
@endsection




