@extends('website.layout')




@section('content')

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.candidate.layout')
            </div>


            <div class="col-12 col-md-9  py-4 ">


                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif

                @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('failed') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>   
                @endif


                    <div class="g-0">
                        <h3 class=" fw-bold  my-4">Shortlist Jobs</h3>
            
                        <form class="col-4 text-center ">
                            <div class="input-group  mb-3">
                            <input type="text" class="form-control rounded-0 p-3" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                
                        </form>  
            
                    </div>






                 <div class="row g-4">

                    @foreach($shortlisted_jobs as $jobs)

                        <div class="col-12  shadow">
                            <div class="product">

                                <div class="row">

                                        <div class="col-3">
                                        <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" height="125px"> 
                                        </div>
                                        <div class="col-7 my-auto">
                                                <span class=" text-uppercase text-warning">{{$jobs->job_type}}</span>
                                         <h5> <a href="#" class="text-decoration-none text-reset"{{$jobs->title}}> </a> 
                                            
                                                <span> <i class="fa fa-star" style="color:#ffc107;"></i> </span>  </h5>  
                                                
                                                
                                                <span class="text-muted"> Posted {{$jobs->job_created_at->diffForHumans()}}</span>    

                                        </div>
                                        <div class="col-2 my-auto">
                                             
                                        <a href="#" class="bg-light p-1 rounded text-decoration-none text-danger">  <span><i class="fa fa-trash-o" aria-hidden="true"></i></span> </a>
                                             

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