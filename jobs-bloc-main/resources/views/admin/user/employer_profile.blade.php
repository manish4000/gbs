@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Employee Profile')])

@section('content')

<!--  -->
<div class="content">
  <div class="container-fluid">

    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Employer </a> <i class="fa-solid fa-caret-right"></i></li>
      <li><a href="#" class="text-decoration-none text-reset ms-1">Profile</a></li>
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
                                            @if ($employer_details->profile_image)
                                            <img src="{{APP_PATH.EMPLOYER_PROFILE_IMAGE_URL}}{{$employer_details->profile_image}}" alt="" height="160" class="rounded-circle img-fluid">
                                            @else
                                            <img src="{{APP_PATH}}images/no_image.png" alt="" height="160" class="rounded-circle img-fluid">
                                            @endif

                       
                                        </div>             
                                    </div>
                                    <div class="col-6 mt-3 mt-md-0 my-auto">
                                        <div>
                                            <p class="fw-bold fs-4">{{$employer_details->user_name}}1 </p>
                                            <p><small> {{$employer_details->job_category}}  </small></p>
                                            <p> <span> <i class="fa-solid text-warning fa-phone"></i> <small class="text-muted"> {{$employer_details->phone}}</small> </span> &ensp; <span> <i class="fa-solid text-warning fa-envelope"></i> <small class="text-muted"> {{$employer_details->email}}</small> </span> </p>
                                            <p class=""> <i class="fa-solid  text-warning fa-location-dot"></i> <small> {{$employer_details->location}}  , {{$employer_details->friendly_address	}}  </small> </p>
                                            <p><i class="fa-solid  text-warning fa-video"></i> <a href="{{$employer_details->introduction_video_url}}" target="_blank">Introduction Video</a></p>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                      <p> <small> Company:   {{$employer_details->company_name}}  </small></p>
                                      <p> <small> Founded On: {{$employer_details->founded_date}}  </small></p>
                                      <p> <small> Website: <a href="{{$employer_details->website}}"> {{$employer_details->website}}</a>   </small></p>
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
        <li class="active px-3 px-lg-5 py-2 "><a href="#social" class="text-decoration-none text-muted" data-toggle="tab">Social</a>
        </li>
        <li class="active px-3 px-lg-5 py-2 "><a href="#team" class="text-decoration-none text-muted" data-toggle="tab">Team</a>
        </li>
        
   
      </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div id="my-tab-content" class="tab-content">
                    <div class="row">
                        <div class="col-8"></div>
                        
                        <div class="col-2"></div>
                    </div>
                    {{-- this is for description --}}
                  <div class="tab-pane active" id="description">
                    <h5 class="py-3">About Me</h5>
                    {!! $employer_details->description!!}
                    

                   
                  </div>
                  {{-- end of description --}}
                    {{-- this is for description --}}
                  <div class="tab-pane " id="social">
                    <h5 class="py-2">Social</h5>

                    @foreach ($employer_social as $social)

                      <div class="row mb-2">
                        <div class="col-4">{{$social->title}} : </div>
                        <div class="col-8"> <a href="{{$social->url}}" target="_blank"> {{$social->url}}</a>  </div>
                      </div>
                    @endforeach

                  </div>
                  {{-- end of description --}}
                    {{-- this is for description --}}
                  <div class="tab-pane " id="team">
                  
                    @isset($employer_teams)
                       
                    <h5 class="mt-3">Teams</h5>
                     
                        @foreach ($employer_teams as $team)
                            
                                    <div class="py-3 ">
                                        <div class=" border p-3 border-dark" >
                                          @if ($team->profile_image)
                                          <img src="{{APP_PATH.EMPLOYER_TEAM_IMAGE_URL}}{{$team->profile_image}}" alt="" height="100" class="mb-2">
                                          @else
                                          <img src="{{APP_PATH}}images/no_image.png" alt="" height="100" class="mb-2">
                                          @endif
                                          <p>Name : {{$team->name}}</p>
                                          <p>Designation : {{$team->designation}}</p>
                                          <p>Facebook : <a href="{{ $team->facebook}}">{{ $team->facebook}}</a> </p>
                                          <p>Twitter : <a href="{{ $team->twitter}}">{{ $team->twitter}}</a> </p>
                                          <p>Linkedin : <a href="{{ $team->linkedin}}">{{ $team->linkedin}}</a> </p>
                                          <p>Instagram : <a href="{{ $team->instagram}}">{{ $team->instagram}}</a> </p>
                                          <p>Experience : {{$team->experience}}</p>
                                          <p>Description : <a href="{{ $team->description}}">{{ $team->description}}</a> </p>
                                          
                                        </div>
                                    </div>
                        @endforeach  
                                                      
                      @endisset
                  
                   
                  </div>
                  {{-- end of description --}}

                 
                 
              
                    {{-- this is end  for awards --}}
                </div>
            </div>
          
        </div>
    </div>
    
  </div>




</div> 


  </div>
</div>
@endsection




