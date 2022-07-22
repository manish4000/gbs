@extends('website.layout')

@section('content')

<div class="container">

        <div class="row">
          

            <div class="col-12 col-md-12  py-4 ">    
                     
            <div class="container my-5">


            <!--Section: Content-->
            <section class="text-center">

            <!-- Section heading -->
            <h3 class="font-weight-bold dark-grey-text pb-2 mb-4">Packages</h3>
            <!-- Section description -->


            <!-- Grid row -->
            <div class="row">

    
            @for($i=1;$i<=9;$i++)
                <!-- Grid column -->
                <div class="col-lg-4 col-md-12 mb-4">

                <!-- Pricing card -->
                <div class="card pricing-card shadow border-0 white-text">

                    <!-- Price -->
                    <div class="rounded-top ">
                        <h6 class="option py-3">STARTER -1 month</h6>
                    </div>

                    <div class="bg-warning text-white mx-5 py-4 rounded">
                        <h3> <strike>2500.00</strike> </h3>
                        <h3>2000.00</h3>
                    </div>

                    <!-- Features -->
                    <div class="card-body striped green-striped card-background text-start px-5">

                        <ul style="list-style-type:none" class="text-muted px-1 py-3">

                            <li class="py-2" >Rs.2000 </li>
                            <li class="py-2" >Visibility -200 profiles </li>
                            <li class="py-2" >Share on social media platforms </li>
                            <li class="py-2" >Cannot message or email</li>
                            <li class="py-2" >Cannot download </li>
                            
                        
                        
                            
                        </ul>

                        <div class="text-center">
                             <button class="btn btn-outline-warning  px-5 py-3">Get Started </button>
                        </div>
                    
                    </div>


                         
                    
                    <!-- Features -->

                </div>

                </div>

            @endfor

            </div>
            <!-- Grid row -->

            </section>
            <!--Section: Content-->


</div>
                                        
        </div>

        </div>

</div>



@endsection