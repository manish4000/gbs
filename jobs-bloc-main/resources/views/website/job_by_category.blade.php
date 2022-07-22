@extends('website.layout')

@section('content')

<div class="container-fluid d-flex justify-content-between align-items-center py-3 bg-light">

    <h3>Jobs By Category</h3>

        <div>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
            </nav>

        </div>
</div>

<div class="container-fluid py-3">

        <div>
               
    
                <form class="row  text-center px-4">
                    <div class="col-12 col-lg-8 mb-3 ">                       
                        <input type="text"  class="form-control border-warning py-4 px-5" id="staticEmail2" value="Job Title or Keyword">
                    </div>
                    <div class=" d-grid  col-lg-4 text-start mb-3">
                        <button type="submit" class="btn btn-warning rounded-pill py-3 btn-large text-white  btn-block  fw-bold px-3"> Find Jobs</button>
                    </div>
           
              </form>  
    
            </div>


</div>

<div class="container-fluid py-3">

        @foreach($job_categories as $category)        

            <div class="row  shadow mx-2 my-3 py-5">

                    <div class="col-12 col-md-3 text-md-center mb-3">
                    <h5 class="fw-bold"> {{$category->title}} </h5> 
                    <span class="text-muted"><small> (10 Jobs)</small> </span>
                    </div>

                    @if($category->children !== null)

                        
                        <div class="col-12 col-md-9">
                                <div class="row text-muted">
                                    @foreach($category->children as $subcategory)
                                    <div class="col-12 col-md-6 col-lg-3"> {{$subcategory->title}} </div>  
                                    @endforeach   
                                </div>
                        </div>
                     
                    @endif 
            </div>

        @endforeach


</div>






@endsection