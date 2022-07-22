@extends('website.layout')

@section('content')

<div class="container">

        <div class="row">
            <div class="col-3">
              @include('website.employer.layout')
            </div>

            <div class="col-12 col-md-9  py-4 ">


                            <div class="g-0">
                                <h3 class=" fw-bold  my-4">Shortlist Candidates</h3>

                                <form class="col-4 text-center ">
                                    <div class="input-group  mb-3">
                                    <input type="text" class="form-control rounded-0 p-3" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>

                                </form>  

                            </div>

                            <div class="row g-4">

                            @for($i=1;$i<=10;$i++)

                                <div class="col-12  shadow">
                                   

                                        <div class="row py-4">

                                               
                                                <div class="col-10 my-auto">
                                                      
                                                <h6> <a href="#" class="text-decoration-none fw-bold text-reset"> Front Office Associate</a>  <span> </span>  </h6>   
                                                  

                                                </div>
                                                <div class="col-2 my-auto">
                                                    
                                                    <a href="#" class="bg-info p-1 rounded text-decoration-none text-dark">  <span><i class="fa fa-eye" aria-hidden="true"></i></span> </a> &ensp;
                                                <a href="#" class="bg-light p-1 rounded text-decoration-none text-danger">  <span><i class="fa fa-trash-o" aria-hidden="true"></i></span> </a>
                                                
                                                    

                                                </div>
                                        </div>           
                                        
                                </div>

                            @endfor

                            </div>


                

                

            </div>



</div>



@endsection