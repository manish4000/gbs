@extends('website.layout')




@section('content')

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.employer.layout')
            </div>


            <div class="col-12 col-md-9  py-4 ">


                    <div class="g-0">

                        <h5 class=" fw-bold  my-4">Change Password</h5>           
                          
                            <form class="w-50">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                        <input type="email" class="form-control p-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">New Password</label>
                                        <input type="email" class="form-control p-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                                       
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Retype Password</label>
                                        <input type="email" class="form-control p-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                                       
                                    </div>
                                    
                                    <div class="mb-3">
                                       
                                        <button type="submit" class="btn btn-warning px-4 py-3 text-white">Change Password</button>
                                       
                                    </div>
                                   
                            </form>
            
                    </div>







            </div>



        </div>

</div>


@endsection