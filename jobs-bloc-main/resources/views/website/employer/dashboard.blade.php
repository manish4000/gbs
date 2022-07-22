@extends('website.layout')

@section('content')

<div class="container">

        <div class="row">
            <div class="col-3">
              @include('website.employer.layout')
            </div>

            <div class="col-9  py-4 px-3">

                    <h5>Applications statistics</h5>           

                    <div class="row g-0 py-2 ">

                        @for($i=1;$i<=4;$i++)
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-4 my-auto my-5 ">
                                            <div class="p-2 ">
                                                
                                                <i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i>
                                            </div>

                                    </div>

                                    <div class="col-8 my-5 ">
                                            <div>
                                                <span>0</span>
                                                <p class="fw-bold">Applied Jobs</p>

                                            </div>

                                    </div>
                                </div>
                            </div>

                        @endfor
                    </div>


                    <div >
                        <h5 class="mt-4">Jobs Applied Recently</h5>
                        <p class="text-muted">No jobs applied.</p>
                    </div>

                

            </div>



        </div>

</div>


@endsection