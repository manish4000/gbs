@extends('website.layout')




@section('content')

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.employer.layout')
            </div>


            <div class="col-12 col-md-9  py-4 ">


                    <div class="g-0">

                        <h5 class=" fw-bold  my-4">Delete Profile</h5>       
                        
                            <h4>Are you sure! You want to delete your profile. </h4>
                               <p> This can't be undone! </p>
                          
                            <form class="w-50">
                                  
                                    
                                    <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">Please enter your login Password to confirm:</label>
                                        <input type="email" class="form-control border-0 border-bottom border-danger p-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                                       
                                    </div>
                                    
                                    <div class="mb-3">
                                       
                                        <button type="submit" class="btn btn-danger px-4 py-3 text-white">Delete Profile</button>
                                       
                                    </div>
                                   
                            </form>
            
                    </div>







            </div>



        </div>

</div>


@endsection