@extends('website.layout')




@section('content')

<div class="container py-4">

 
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Cart </span><span class="h4">(1 item in your cart)</span></p>

        <div class="card mb-4">
          <div class="card-body p-4">

            <div class="row align-items-center">
              <div class="col-12 col-md-2">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/1.webp"
                  class="img-fluid" alt="Generic placeholder image">
              </div>
              <div class="col-12 col-md-2 d-flex justify-content-between d-md-block">
                    <p class="small text-muted">Name</p>
                    <p class=" fw-normal ">iPad Air</p>
                
              </div>
              <div class="col-12 col-md-2 d-flex justify-content-between d-md-block">
              
                  <p class="small text-muted  ">Quantity</p>
                  <p class=" fw-normal mb-0">1</p>
                
              </div>
              <div class="col-12 col-md-2 d-flex justify-content-between d-md-block">
              
                  <p class="small text-muted mb-4 pb-2">Price</p>
                  <p class=" fw-normal mb-0">$799</p>
               
              </div>
              <div class="col-12 col-md-2 d-flex justify-content-between d-md-block">
              
                  <p class="small text-muted mb-4 pb-2">Total</p>
                  <p class=" fw-normal mb-0">$799</p>
                
              </div>
              <div class="col-12 col-md-2 d-flex justify-content-between d-md-block">
                
                  <p class="small text-muted mb-4 pb-2">Remove</p>
                  <p class=" fw-normal mb-0"><a href="#"><i class="fa fa-times" aria-hidden="true"></i> </a> </p>
                
              </div>
            </div>

          </div>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">

            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Order total:</span> <span
                  class="lead fw-normal">$799</span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-light btn-lg me-2">Continue shopping</button>
          <button type="button" class="btn btn-primary btn-lg">CheckOut</button>
        </div>

      </div>
    </div>




</div>


@endsection