@extends('website.layout')




@section('content')

<style>
.application-icon i {
font-size: 26px;
}
.application-icon .fa-circle-check{
    color: green;
}
.application-icon .fa-circle-xmark{
    color: red;
}
.application-icon .fa-star{
    color: #e1ad01;
}
.application-icon .fa-trash-can{
    color: red;
}

</style>

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.employer.layout')
            </div>


            <div class="col-12 col-md-9  py-4 ">


                    <div class="g-0">
                        <h3 class=" fw-bold  my-4">Manage Jobs</h3>
            
                        <form class="col-4 text-center ">
                            <div class="input-group  mb-3">
                            <input type="text" class="form-control rounded-0 p-3" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                
                        </form>  
            
                    </div>

                    <div class="">
  
                                    
                                     @foreach ($jobs as $job) 
                                    
                                @php
                                     $job_candidates = DB::table('job_applications')
                                                    ->select('job_applications.id','job_applications.application_status','job_applications.shortlist_status','job_applications.created_at as apply_date','job_applications.user_id','job_applications.job_id','candidate_resume.cv','users.id as user_id','users.name as user_name','candidate_details.featured_image')
                                                    ->leftJoin('users','users.id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_resume','candidate_resume.user_id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_details','job_applications.user_id','=','candidate_details.user_id')
                                                    ->where('job_id',$job->id)->get()->toArray();	
                                     $approved_job_candidates = DB::table('job_applications')
                                                    ->select('job_applications.id','job_applications.application_status','job_applications.shortlist_status','candidate_resume.cv','job_applications.created_at as apply_date','job_applications.user_id','job_applications.job_id','users.id as user_id','users.name as user_name','candidate_details.featured_image')
                                                    ->leftJoin('users','users.id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_resume','candidate_resume.user_id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_details','job_applications.user_id','=','candidate_details.user_id')
                                                    ->where('job_id',$job->id)->where('job_applications.application_status','1')->get()->toArray();	

                                     $rejected_job_candidates = DB::table('job_applications')
                                                    ->select('job_applications.id','job_applications.application_status','job_applications.shortlist_status','candidate_resume.cv','job_applications.created_at as apply_date','job_applications.user_id','job_applications.job_id','users.id as user_id','users.name as user_name','candidate_details.featured_image')
                                                    ->leftJoin('users','users.id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_resume','candidate_resume.user_id','=','job_applications.user_id')
                                                    ->leftJoin('candidate_details','job_applications.user_id','=','candidate_details.user_id')
                                                    ->where('job_id',$job->id)->where('job_applications.application_status','0')->get()->toArray();	

                                     $total_applications = DB::table('job_applications') ->where('job_id',$job->id)->count();           

                                     $total_approved = DB::table('job_applications') ->where('job_id',$job->id)->where('application_status','1')->count();           

                                     $total_rejected = DB::table('job_applications') ->where('job_id',$job->id)->where('application_status','0')->count();           
                                 @endphp   


                                    <div class="container border mb-3">
                                        <div id="content">

                                           <div class="row border-bottom mt-2">
                                            <div class="col-7"><h6 class="mt-2">{{$job->title}}</h6> 
                                                </div>    
                                            <div class="col-5">
                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link active" id="pills-home-tab-{{$job->slug}}" data-bs-toggle="pill" data-bs-target="#pills-home-{{$job->slug}}" type="button" role="tab" aria-controls="pills-home-{{$job->slug}}" aria-selected="true">Total :{{$total_applications}}</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link" id="pills-profile-tab-{{$job->slug}}" data-bs-toggle="pill" data-bs-target="#pills-profile-{{$job->slug}}" type="button" role="tab" aria-controls="pills-profile-{{$job->slug}}" aria-selected="false">Approved :{{$total_approved}}</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                      <button class="nav-link" id="pills-contact-tab-{{$job->slug}}" data-bs-toggle="pill" data-bs-target="#pills-contact-{{$job->slug}}" type="button" role="tab" aria-controls="pills-contact-{{$job->slug}}" aria-selected="false">Rejected :{{$total_rejected}}</button>
                                                    </li>
                                                  </ul>
                                            </div>
                                        </div> 

                                          
                                        </div>
                                        <div class="container">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home-{{$job->slug}}" role="tabpanel" aria-labelledby="pills-home-tab-{{$job->slug}}">

                                                    @if($job_candidates == null)

                                                    <h6 class="my-2">No applicants found.</h6>

                                                    @else

                                                    @foreach($job_candidates as $candidate)
                                                     
                                                     <div class="row my-3">
                                                         <div class="col-2">
                                                             @if(isset($candidate->featured_image))
                                                             <img src="{{APP_PATH.CANDIDATE_FEATURE_IMAGE_URL}}{{$candidate->featured_image}}" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @else
                                                             <img src="https://jobsbloc.com/wp-content/uploads/2021/12/022-1.png" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @endif
                                                         </div>
                                                         <div class="col-4 my-auto">
                                                           <a href="{{route('candidates.details',['name'=>$candidate->user_id,'id'=>$candidate->user_id ])}}" class="fw-bold text-decoration-none text-reset"> {{$candidate->user_name}} </a> 
                                                           <a href="{{route('job_details',[ 'title' =>  $job->slug, 'id' => $job->id])}}" class="text-decoration-none text-reset "><h6 class="text-warning">{{$job->title}} </h6> </a>
                                                           <p> <small>- {{ date('d-M-Y', strtotime($candidate->apply_date)); }} </small> </p> 
                                                         </div>
                                                         <div class="col-2 my-auto">

                                                            @if($candidate->application_status == 0 )
                                                            <p> <span class="badge  bg-danger text-white">Rejected</span> </p>  
                                                            @elseif($candidate->application_status == 1 )
                                                            <p> <span class="badge  bg-success text-white">Approved</span> </p>  
                                                            @elseif($candidate->application_status == 2 )
                                                            <p> <span class="badge  bg-secondary text-white">Pending</span> </p>  
                                                            @endif
                                                           

                                                            @if($candidate->shortlist_status == 1 )
                                                            <p><span class="badge bg-warning  text-white">Shortlisted</span></p>
                                                            @endif
                                                         </div>
                                                         <div class="col-4 my-auto application-icon">
                                                             <div class="d-flex justify-content-around">
                                                                    <a href="{{route('employer.applicants.application_status',['id'=>$candidate->id,'status'=> '1'])}}"><i class="fa-regular fa-circle-check " title="Approve Application"></i> </a> 
                                                                     <a href="{{route('employer.applicants.application_status',['id'=>$candidate->id,'status'=> '0'])}}"><i class="fa-regular fa-circle-xmark " title="Reject Application"></i> </a> 
                                                                     <a href="{{route('employer.applicants.application_status',['id'=>$candidate->id,'status'=> '2'])}}"><i class="fa-regular fa-clock" title="Pending Application"></i> </a> 
                                                                     <a href="{{route('employer.applicants.application_shortlist',$candidate->id)}}"><i class="fa-regular fa-star " title="shortlisted"></i> </a> 
                                                                     <a href="{{APP_PATH.CANDIDATE_CV_URL}}{{$candidate->cv}}"><i class="fa-solid fa-file-arrow-down " title="Download CV"></i> </a> 
                                                                     <a href="{{route('employer.applicants.remove',$candidate->id)}}" onclick="confirm('Are You sure You want to remove this Application') || event.stopImmediatePropagation()"><i class="fa-regular fa-trash-can " title="Remove"></i> </a>    
 
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <hr>
                                                    @endforeach

                                                    @endif

                                                
                                                
                                                </div>
                                                <div class="tab-pane fade" id="pills-profile-{{$job->slug}}" role="tabpanel" aria-labelledby="pills-profile-tab-{{$job->slug}}">
                                                    
                                                    @if($approved_job_candidates == null)

                                                    <h6 class="my-2">No applicants found.</h6>

                                                    @else

                                                    @foreach($approved_job_candidates as $app_candidate)
                                                     
                                                     <div class="row my-3">
                                                         <div class="col-2">
                                                             @if(isset($app_candidate->featured_image))
                                                             <img src="{{APP_PATH.CANDIDATE_FEATURE_IMAGE_URL}}{{$app_candidate->featured_image}}" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @else
                                                             <img src="https://jobsbloc.com/wp-content/uploads/2021/12/022-1.png" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @endif
                                                         </div>
                                                         <div class="col-4 my-auto">
                                                           <a href="{{route('candidates.details',['name'=>$app_candidate->user_id,'id'=>$app_candidate->user_id ])}}" class="fw-bold text-decoration-none text-reset"> {{$app_candidate->user_name}} </a> 
                                                           <a href="{{route('job_details',[ 'title' =>  $job->slug, 'id' => $job->id])}}" class="text-decoration-none text-reset "><h6 class="text-warning">{{$job->title}} </h6> </a>
                                                           <p> <small>- {{ date('d-M-Y', strtotime($app_candidate->apply_date)); }} </small> </p> 
                                                         </div>
                                                         <div class="col-2 my-auto">

                                                            @if($app_candidate->application_status == 0 )
                                                            <p> <span class="badge  bg-danger text-white">Rejected</span> </p>  
                                                            @elseif($app_candidate->application_status == 1 )
                                                            <p> <span class="badge  bg-success text-white">Approved</span> </p>  
                                                            @elseif($app_candidate->application_status == 2 )
                                                            <p> <span class="badge  bg-secondary text-white">Pending</span> </p>  
                                                            @endif
                                                           

                                                            @if($app_candidate->shortlist_status == 1 )
                                                            <p><span class="badge bg-warning  text-white">Shortlisted</span></p>
                                                            @endif
                                                         </div>
                                                         <div class="col-4 my-auto application-icon">
                                                             <div class="d-flex justify-content-around">

                                                                <a href="{{route('employer.applicants.application_status',['id'=>$app_candidate->id,'status'=> '1'])}}"><i class="fa-regular fa-circle-check " title="Approve Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_status',['id'=>$app_candidate->id,'status'=> '0'])}}"><i class="fa-regular fa-circle-xmark " title="Reject Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_status',['id'=>$app_candidate->id,'status'=> '2'])}}"><i class="fa-regular fa-clock" title="Pending Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_shortlist',$app_candidate->id)}}"><i class="fa-regular fa-star " title="shortlisted"></i> </a> 
                                                                <a href="{{APP_PATH.CANDIDATE_CV_URL}}{{$app_candidate->cv}}"><i class="fa-solid fa-file-arrow-down " title="Download CV"></i> </a> 
                                                                <a href="{{route('employer.applicants.remove',$app_candidate->id)}}" onclick="confirm('Are You sure You want to remove this Application') || event.stopImmediatePropagation()"><i class="fa-regular fa-trash-can " title="Remove"></i> </a>      

                                                             </div>
                                                         </div>
                                                     </div>
                                                     <hr>
                                                    @endforeach

                                                    @endif

                                                
                                                </div>
                                                <div class="tab-pane fade" id="pills-contact-{{$job->slug}}" role="tabpanel" aria-labelledby="pills-contact-tab-{{$job->slug}}">
                                                    
                                                    
                                                    @if($rejected_job_candidates == null)

                                                    <h6 class="my-2">No applicants found.</h6>

                                                    @else

                                                    @foreach($rejected_job_candidates as $rej_candidate)
                                                     
                                                     <div class="row my-3">
                                                         <div class="col-2">
                                                             @if(isset($rej_candidate->featured_image))
                                                             <img src="{{APP_PATH.CANDIDATE_FEATURE_IMAGE_URL}}{{$rej_candidate->featured_image}}" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @else
                                                             <img src="https://jobsbloc.com/wp-content/uploads/2021/12/022-1.png" class="rounded-circle" height="100px" width="100px" alt="" >
                                                             @endif
                                                         </div>
                                                         <div class="col-4 my-auto">
                                                           <a href="{{route('candidates.details',['name'=>$rej_candidate->user_id,'id'=>$rej_candidate->user_id ])}}" class="fw-bold text-decoration-none text-reset"> {{$rej_candidate->user_name}} </a> 
                                                           <a href="{{route('job_details',[ 'title' =>  $job->slug, 'id' => $job->id])}}" class="text-decoration-none text-reset "><h6 class="text-warning">{{$job->title}} </h6> </a>
                                                           <p> <small>- {{ date('d-M-Y', strtotime($rej_candidate->apply_date)); }} </small> </p> 
                                                         </div>
                                                         <div class="col-2 my-auto">

                                                            @if($rej_candidate->application_status == 0 )
                                                            <p> <span class="badge  bg-danger text-white">Rejected</span> </p>  
                                                            @elseif($rej_candidate->application_status == 1 )
                                                            <p> <span class="badge  bg-success text-white">Approved</span> </p>  
                                                            @elseif($rej_candidate->application_status == 2 )
                                                            <p> <span class="badge  bg-secondary text-white">Pending</span> </p>  
                                                            @endif
                                                           

                                                            @if($rej_candidate->shortlist_status == 1 )
                                                            <p><span class="badge bg-warning  text-white">Shortlisted</span></p>
                                                            @endif
                                                         </div>
                                                         <div class="col-4 my-auto application-icon">
                                                             <div class="d-flex justify-content-around">
                                                                <a href="{{route('employer.applicants.application_status',['id'=>$rej_candidate->id,'status'=> '1'])}}"><i class="fa-regular fa-circle-check " title="Approve Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_status',['id'=>$rej_candidate->id,'status'=> '0'])}}"><i class="fa-regular fa-circle-xmark " title="Reject Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_status',['id'=>$rej_candidate->id,'status'=> '2'])}}"><i class="fa-regular fa-clock" title="Pending Application"></i> </a> 
                                                                <a href="{{route('employer.applicants.application_shortlist',$rej_candidate->id)}}"><i class="fa-regular fa-star " title="shortlisted"></i> </a> 
                                                                <a href="{{APP_PATH.CANDIDATE_CV_URL}}{{$rej_candidate->cv}}"><i class="fa-solid fa-file-arrow-down " title="Download CV"></i> </a> 
                                                                <a href="{{route('employer.applicants.remove',$rej_candidate->id)}}" onclick="confirm('Are You sure You want to remove this Application') || event.stopImmediatePropagation()"><i class="fa-regular fa-trash-can " title="Remove"></i> </a>     
 
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <hr>
                                                    @endforeach

                                                    @endif

                                                    
                                                </div>
                                              </div>
        
                                        </div>
                                        
                                    </div>

                                    
                                    @endforeach 

                   
                        
                    </div>




            </div>

        </div>

</div>


@endsection