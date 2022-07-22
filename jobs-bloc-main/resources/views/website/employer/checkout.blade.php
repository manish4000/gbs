@extends('website.layout')




@section('content')

<div class="container py-4">

@extends('website.layout')




@section('content')

<div class="container py-4">

<main class="bg-light">

     <!-- DEMO HTML -->
     <div class="container ">
 

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your Order</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Product name  <span>* 1 </span> </h6>  
                    
                </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Second product <span>* 1 </span></h6>
                    
                </div>
                <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h6 class="my-0">Third item <span>* 1 </span></h6>
                    
                </div>
                <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                    <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-secondary">Redeem</button>
                </div>
                </div>
            </form>
            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
                <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="" value="" required>                    
                </div>
                <div class="col-md-6 mb-3">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" id="lastName" placeholder="" value="" required>          
                </div>

                </div>

                <div class="mb-3">
                <label for="username">Company name (optional)</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>    
                </div>

                <div class="mb-3">
              
                    <label for="country">Country / Region *</label>
                    <select class="form-select d-block w-100" id="country" required>
                    <option value="">Choose...</option>
                    <option>United States</option>
                    </select>
                </div>

                <div class="mb-3">
                <label for="country">Street address *</label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                    <label for="floatingTextarea"> Street address </label>
                </div>
                </div>

                <div class="mb-3">
                <label for="address2">Postcode / ZIP *</label>
                <input type="text" class="form-control" id="address2" placeholder="201012">
                </div>
                <div class="mb-3">
                <label for="address2">Town / City *</label>
                <input type="text" class="form-control" id="address2" placeholder="jaipur">
                </div>

                <div class="mb-3">
                <label for="address2">Phone</label>
                <input type="text" class="form-control" id="address2" placeholder="1234567890">
                </div>

                <div class="mb-3">
                <label for="address2">Email address *</label>
                <input type="text" class="form-control" id="address2" placeholder="example@gmail.com">
                </div>

                <div class="mb-3">
                <label for="address2">Order notes (optional)</label>
                 <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit">PLACE ORDER</button>
            </form>
            </div>
        </div>

</div>
     <!-- End Demo HTML -->
     
 </main>

</div>


@endsection


</div>


@endsection