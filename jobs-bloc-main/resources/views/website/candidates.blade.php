@extends('website.layout')

@section('content')
 <!-- Shop Start -->
 <div class="container">
   
</div>
<!-- Shop End -->





<div class="container mt-5 mb-5">
   <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-4">
          <!-- Price Start -->
          {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by price</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="price-all">
                      <label class="custom-control-label" for="price-all">All Price</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-1">
                      <label class="custom-control-label" for="price-1">$0 - $100</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-2">
                      <label class="custom-control-label" for="price-2">$100 - $200</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-3">
                      <label class="custom-control-label" for="price-3">$200 - $300</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="price-4">
                      <label class="custom-control-label" for="price-4">$300 - $400</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="price-5">
                      <label class="custom-control-label" for="price-5">$400 - $500</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div>
          <!-- Price End -->
          
          <!-- Color Start -->
          <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by color</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="color-all">
                      <label class="custom-control-label" for="price-all">All Color</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-1">
                      <label class="custom-control-label" for="color-1">Black</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-2">
                      <label class="custom-control-label" for="color-2">White</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-3">
                      <label class="custom-control-label" for="color-3">Red</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="color-4">
                      <label class="custom-control-label" for="color-4">Blue</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="color-5">
                      <label class="custom-control-label" for="color-5">Green</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div>
          <!-- Color End -->

          <!-- Size Start -->
          <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Filter by size</span></h5>
          <div class="bg-light p-4 mb-30">
              <form>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" checked id="size-all">
                      <label class="custom-control-label" for="size-all">All Size</label>
                      <span class="badge border font-weight-normal">1000</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-1">
                      <label class="custom-control-label" for="size-1">XS</label>
                      <span class="badge border font-weight-normal">150</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-2">
                      <label class="custom-control-label" for="size-2">S</label>
                      <span class="badge border font-weight-normal">295</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-3">
                      <label class="custom-control-label" for="size-3">M</label>
                      <span class="badge border font-weight-normal">246</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                      <input type="checkbox" class="custom-control-input" id="size-4">
                      <label class="custom-control-label" for="size-4">L</label>
                      <span class="badge border font-weight-normal">145</span>
                  </div>
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                      <input type="checkbox" class="custom-control-input" id="size-5">
                      <label class="custom-control-label" for="size-5">XL</label>
                      <span class="badge border font-weight-normal">168</span>
                  </div>
              </form>
          </div> --}}
          <!-- Size End -->
      </div>
      <!-- Shop Sidebar End -->


      <!-- Shop Product Start -->
      <div class="col-lg-9 col-md-8">
        
          <div class="row pb-3">
              <div class="col-12 pb-1">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <div>
                        <button type="submit" class="btn btn-warning   py-3  text-white  fw-bold px-5"> Get Candidate Alerts</button>
                      </div>
                      <div class="ml-2">
                          <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">Latest</a>
                                  <a class="dropdown-item" href="#">Popularity</a>
                                  <a class="dropdown-item" href="#">Best Rating</a>
                              </div>
                          </div>
                          <div class="btn-group ml-2">
                              <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                              <div class="dropdown-menu dropdown-menu-right">
                                  <a class="dropdown-item" href="#">10</a>
                                  <a class="dropdown-item" href="#">20</a>
                                  <a class="dropdown-item" href="#">30</a>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>

            @if(count($candidates) > 0)
                    
                @foreach ( $candidates as $candidate)
                
                <div class="col-12 col-lg-6 ">
                    <div class="product pt-5 shadow fade-in">

                            <div class="text-center">
                            
                            @if(isset($candidate->featured_image))  
                            <img src="{{CANDIDATE_FEATURE_IMAGE_URL}}{{$candidate->featured_image}}" height="120px" > 
                            @else
                            <img src="https://jobsbloc.com/wp-content/themes/careerup/images/placeholder.png" height="120px" > 
                            @endif
                            
                            </div>
                            <div class="about text-center">
                            <h6 class="text-uppercase fw-bold">{{$candidate->name}}</h6>
                            <span>4t5rtre</span> 
                            @isset($candidate->location)
                            <div class="d-flex justify-content-between px-5 bg-light py-3">
                            <span class="text-danger ">Location</span>
                            
                            <span class="text-muted"> <i class="fa-solid text-danger fa-location-dot"></i> {{$candidate->location}}</span>
                            </div>  
                            @endisset
                                
                            @isset($candidate->job_category)
                            <div class="d-flex justify-content-between px-5  py-3">
                                <span class="text-danger ">Sector</span>
                                <span >
                                    <a href="#" class="text-decoration-none text-muted"" > {{$candidate->job_category}}</a>
                                </span>
                            </div>   
                            @endisset
                            </div>
                            
                            <div class="text-center py-3">
                            <a href="{{route('candidates.details',['name' => $candidate->name,'id' => $candidate->id])}}" class="btn btn-outline-warning rounded btn-block px-4 py-2" > View Profile </a>
                            </div>
                    </div>
                </div>
                @endforeach
            @else
            <p class="text-center mt-3">No candidates found </p> 
            @endif


              {{-- <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                  <div class="product-item bg-light mb-4">
                      <div class="product-img position-relative overflow-hidden">
                          <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                          <div class="product-action">
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                              <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                          </div>
                      </div>
                      <div class="text-center py-4">
                          <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                          <div class="d-flex align-items-center justify-content-center mt-2">
                              <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                          </div>
                          <div class="d-flex align-items-center justify-content-center mb-1">
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small class="fa fa-star text-primary mr-1"></small>
                              <small>(99)</small>
                          </div>
                      </div>
                  </div>
              </div> --}}
           
              <div class="col-12 mt-4 py-4" >
                  {{-- <nav>
                    <ul class="pagination justify-content-start">
                      <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav> --}}
              </div>
          </div>
      </div>
      <!-- Shop Product End -->
  </div>


</div>




@endsection