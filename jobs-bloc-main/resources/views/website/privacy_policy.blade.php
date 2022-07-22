@extends('website.layout')

@section('content')

<div class="container-fluid  py-4 bg-light">

    <div class="container d-flex justify-content-between align-items-center">
        <h3>Privacy Policy</h3>
    
            <div>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
                </ol>
                </nav>
    
           </div>

    </div>
</div>


    
  <div class="container  py-5 ">

            @for($i=1;$i<=10;$i++)
                    <h2> Who we are</h2>
                <p>We are a dedicated team who are continuously working to make you feel at home and give you a personalized touch at every step because we here at Jobsbloc understand the importance of a satisfying career..</p>
            @endfor

  </div>






@endsection