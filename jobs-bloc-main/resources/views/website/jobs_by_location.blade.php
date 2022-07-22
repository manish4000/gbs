@extends('website.layout')

@section('content')

<div class="container-fluid  py-4 bg-light">

    <div class="container d-flex justify-content-between align-items-center">
        <h3>Jobs By Location</h3>
    
            <div>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-reset">Home</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"> Jobs By Locations</li>
                </ol>
                </nav>
    
           </div>

    </div>
</div>



    <div class="container border-bottom border-2 border-dark mb-4">

        <h5 class="my-5">Jobs in Popular Cities</h5>

        <div class="container">
            
            <div class="row text-center" >

            @for($i=1;$i<=5;$i++)
            <div class="col-2">
                <img src="https://jobsbloc.com/wp-content/uploads/2021/12/kolkata-skyline-trendy-linear-vector-5669552-e1640500970423-768x635.jpg"  height="160" alt=""> 
            </div>
            @endfor
                          
            </div>
        </div>


    
         <div class="row my-3">

             <h2 class="fw-bold">1 Tier</h2>
            @foreach($job_locations as $location)
             <div class="col-12 col-md-3 mb-2">
                 <li><a href="#" class="text-decoration-none text-reset" title="{{$location->title}}"> <small>{{$location->title}}</small>  </a></li>
             </div>
            @endforeach
         </div>  

         {{-- <div class="row my-3">

             <h2 class="fw-bold">2 Tier & 3 Tear</h2>
            @for($i=1;$i<=30;$i++)
             <div class="col-12 col-md-3 mb-2">
                 <li><a href="#" class="text-decoration-none text-reset" title="jobs"> <small>Jobs in Ajmer </small>  </a></li>
             </div>
            @endfor
         </div>   --}}

    </div>


@endsection