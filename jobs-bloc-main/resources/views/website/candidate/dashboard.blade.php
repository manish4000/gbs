@extends('website.layout')

@section('content')

<div class="container">

        <div class="row">
            <div class="col-3">
              @include('website.candidate.layout')
            </div>

            <div class="col-9  py-4 px-3">

                    <h5>Applications statistics</h5>           

                     <div class="container my-5 py-5">

                                    <!--Section: Block Content-->
                                    <section>

                                    <!--Grid row-->
                                    <div class="row">

                                        <!--Grid column-->
                                        <div class="col-lg-3 col-6 mb-4">

                                        <div class="media blue lighten-2  z-depth-1 rounded">
                                            <i class="far fa-money-bill-alt fa-3x blue z-depth-1 p-4 rounded-left "></i>
                                            <div class="media-body">
                                            <p class="text-uppercase mt-2 mb-1 ml-3"><small>sales</small></p>
                                            <p class="font-weight-bold mb-1 ml-3">23 000$</p>


                                            </div>
                                        </div>


                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-3 col-6 mb-4">

                                        <div class="media deep-purple lighten-2  z-depth-1 rounded">
                                            <i class="fas fa-chart-bar fa-3x deep-purple z-depth-1 p-4 rounded-left "></i>
                                            <div class="media-body">
                                            <p class="text-uppercase mt-2 mb-1 ml-3"><small>Traffic</small></p>
                                            <p class="font-weight-bold mb-1 ml-3">323 540</p>
                                        

                                            </div>
                                        </div>


                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-3 col-6 mb-4">

                                        <div class="media pink lighten-2  z-depth-1 rounded">
                                            <i class="fas fa-download fa-3x pink z-depth-1 p-4 rounded-left "></i>
                                            <div class="media-body">
                                            <p class="text-uppercase mt-2 mb-1 ml-3"><small>downloads</small></p>
                                            <p class="font-weight-bold mb-1 ml-3">13 540</p>
                                        

                                            </div>
                                        </div>


                                        </div>
                                        <!--Grid column-->

                                        <!--Grid column-->
                                        <div class="col-lg-3 col-6 mb-4">

                                        <div class="media pink lighten-2  z-depth-1 rounded">
                                            <i class="fas fa-download fa-3x pink z-depth-1 p-4 rounded-left "></i>
                                            <div class="media-body">
                                            <p class="text-uppercase mt-2 mb-1 ml-3"><small>downloads</small></p>
                                            <p class="font-weight-bold mb-1 ml-3">13 540</p>
                                            </div>
                                        </div>


                                        </div>
                                        <!--Grid column-->

                                    </div>
                                    <!--Grid row-->

                                    </section>
                                    <!--Section: Blocks Content-->


            </div>

                    <div >
                        <h5 class="mt-4">Jobs Applied Recently</h5>
                        <p class="text-muted">No jobs applied.</p>
                    </div>

                

            </div>



        </div>

</div>


@endsection