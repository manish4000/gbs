@extends('website.layout')




@section('content')

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

                        <div class="row text-start py-3 border bg-light" >
                            <div class="col-6">  <h6> Job Title </h6></div>
                            <div class="col-2"> <h6> Applicants </h6></div>
                            <div class="col-2"> <h6> Preview </h6> </div>
                            <div class="col-2">	<h6>Actions </h6>  </div>
                        </div>  
                                    
                                    @foreach ($my_jobs as $job)
                                        
                                    <div class="row  mt-3 p-3 border">
                                        <div class="col-6"> 
                                             <h6 class="mt-2">{{$job->title}}</h6> 
                                             <div class="text=start">
                                                 <p><small> <i class="fa fa-map-marker" aria-hidden="true"></i> Maharastra </small> </p>
                                                 <p> <small> <i class="fa fa-calendar" aria-hidden="true"></i> Created : <span> {{ date('d-M-y', strtotime($job->created_at)) }}</span>  </small> <small>    <i class="fa fa-calendar" aria-hidden="true"></i> Expiry : <span>  {{$job->application_deadline_date}}</span> </small>  </p>
                                             </div>
                                        </div>
                                        <div class="col-2 ">({{($job->applicants)??0}}) Applicants</div>
                                        <div class="col-2 ">Preview</div>
                                        <div class="col-2 ">  <a href="{{route('employer.submit_job.edit',$job->slug)}}" class="bg-info p-1 rounded text-decoration-none text-dark">  <span><i class="fa fa-edit" aria-hidden="true"></i></span> </a>&ensp;
                                            <a href="#" class="bg-light p-1 rounded text-decoration-none text-danger">  <span><i class="fa fa-trash-o" aria-hidden="true"></i></span> </a></div>
                                    </div>
                                    
                                    @endforeach    


     
                                      
                               
                   
                        
                    </div>




            </div>

//

        </div>

</div>


@endsection