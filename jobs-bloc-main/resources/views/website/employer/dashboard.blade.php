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

                       
                            
                            <div class="col-3">
                                <div class="card bg-light m-3 border-warning">
                                    <div class="card-content">
                                      <div class="card-body">
                                        <div class="media d-flex justify-content-between">
                                          <div class="align-self-center">
                                            <i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i>
                                          </div>
                                          <div class="media-body text-end">
                                            <h4>0</h4>
                                            <p>Posted Jobs</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-light m-3 border-warning">
                                    <div class="card-content">
                                      <div class="card-body">
                                        <div class="media d-flex justify-content-between">
                                          <div class="align-self-center">
                                            <i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i>
                                          </div>
                                          <div class="media-body text-end">
                                            <h4>0</h4>
                                            <p>Shortlisted</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            {{-- <div class="col-3">
                                <div class="card bg-light m-3 border-warning">
                                    <div class="card-content">
                                      <div class="card-body">
                                        <div class="media d-flex justify-content-between">
                                          <div class="align-self-center">
                                            <i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i>
                                          </div>
                                          <div class="media-body text-end">
                                            <h4>156</h4>
                                            <p>New Comments</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-3">
                                <div class="card bg-light m-3 border-warning">
                                    <div class="card-content">
                                      <div class="card-body">
                                        <div class="media d-flex justify-content-between">
                                          <div class="align-self-center">
                                            <i class="fa fa-paper-plane-o fa-2x" aria-hidden="true"></i>
                                          </div>
                                          <div class="media-body text-end">
                                            <h4>156</h4>
                                            <p>New Comments</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div> --}}

                        
                    </div>


                    <div class="text-center">
                        <h5 class="mt-4">Jobs Applied Recently</h5>
                        <p class="text-muted">No jobs applied.</p>
                    </div>

                

            </div>



        </div>

</div>


@endsection