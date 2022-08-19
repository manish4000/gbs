@extends('website.layout')

@section('content')


<!--  -->

<div class="content">
    <div class="container-fluid bg-light p-4" >
  
     <div class="container">

         <ol class="breadcrumb bg-white d-flex justify-content-start  ">
           <li><a href="{{URL::to('employer/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
            
          
           <li><a href="#" class="text-decoration-none text-reset ms-1">Submit Job   </a></li>
         </ol>
    </div>   

  
      @if (\Session::has('status_update'))
     
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Status Updated
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
  
      @if (\Session::has('status_not_update'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Status not Updated
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
  
  
  
    
                        
                    <div class="container bg-white p-4" >
                        <form action="{{route('employer.submit_job.store')}}"  method="POST" id="create_job" enctype="multipart/form-data">
                            @csrf
                            
                           <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="title">Job Title</label>
                                        <input type="text" class="form-control "name="title" value="{{$job_data->title}}" required>
                                        <span class="text-danger error-text  title_error "></span>
                                        </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="">Job Types</label>
                                        <select name="job_type_id" id="" class="form-control " required> 
                    
                                            @foreach ($job_types as $type)
                                            
                                            <option value="{{$type->id}}"<?php echo  ($type->id == $job_data->job_type_id )? "selected" : '' ;?> >{{$type->title}}</option>
                    
                                            @endforeach
                                        
                                        </select>
                                        <span class="text-danger error-text  job_type_id_error "></span>
                                    </div>
                                </div>
                            </div>  
                           <div class="row mb-3">
                                <div class="col">
                                         <div class="form-group">
                                                <label class="mb-2" for="">Job Category </label>
                                                <select name="job_category_id[]" id="category-select" class="form-control " multiple required> 
                            
                                                    @foreach ($job_categories as $type)
                                                    
                                                    <option value="{{$type->id}}">{{$type->title}}</option>
                            
                                                    @endforeach
                                                
                                                </select>
                                                <span class="text-danger error-text  job_category_id_error "></span>
                                        </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="title">Application Deadline Date</label>
                                        <input type="date" class="form-control " value="" name="application_deadline_date" required>
                                        <span class="text-danger error-text  application_deadline_date_error "></span>
                                    </div>
                                </div>
                            </div> 
                        
                         
                            <div class="row mb-3">

                                    <div class="form-group " >
                                    <label class="mb-2" for="">Job Skills </label>
                                    <select name="skill_id[]" id="skill-select" class="form-control p-5"  multiple required> 
                
                                        @foreach ($skills as $skill)
                                        
                                        <option value="{{$skill->id}}">{{$skill->title}}</option>
                
                                        @endforeach
                                    
                                    </select>
                                    <span class="text-danger error-text  job_category_id_error "></span>
                                    </div>
                
                            </div>
                            <div class="row mb-3">

                                <div class="form-group">
                            
                                    <label class="mb-2" for="">Job Description</label>
                                    <textarea name="description"  class="form-control mt-3" id="editor1" cols="30" rows="5" placeholder="Description"></textarea>
                                    <span class="text-danger error-text  description_error "></span>
                                </div>
                
                            </div>
    
                            
                            <div class="row mb-3">

                                <div class="form-group ">                                      
                                    

                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Feature Image </label>
                                        <input class="form-control" name="feature_image" type="file" id="formFile">
                                        <span class="text-danger error-text  feature_image_error "></span>
                                    </div>

                                </div>  
                            </div>
                
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="title">Min Salary</label>
                                        <input type="text" class="form-control" value="" name="min_salary" required>
                                        <span class="text-danger error-text  min_salary_error "></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="title">Max Salary</label>
                                        <input type="text" class="form-control" value="" name="max_salary" required>
                                        <span class="text-danger error-text  max_salary_error "></span>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row mb-3">
                                <div class="col">
                                     
                                            <div class="form-group">
                                                <label class="mb-2" for="">Salary Type </label>
                                                <select name="salary_type_id"  class="form-control "  required> 
                            
                                                    @foreach ($salary_type as $type)
                                                    
                                                    <option value="{{$type->id}}">{{$type->title}}</option>
                            
                                                    @endforeach
                                                
                                                </select>
                                                <span class="text-danger error-text  salary_type_id_error "></span>
                                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="mb-2" for="">Location  </label>
                                        <select name="location_id[]" id="location-select"  class="form-control "  required multiple> 
                    
                                            @foreach ($location as $type)
                                    
                                            <option value="{{$type->id}}">{{$type->title}}</option>
                    
                                            @endforeach
                                        
                                        </select>
                                        <span class="text-danger error-text  location_id_error "></span>
                                        </div>
                                </div>
                            </div> 
                            
                           
                            <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mb-2" for="">Address</label>
                                            <textarea name="address"  class="form-control" id="editor1" cols="30" rows="5" placeholder="address"></textarea>
                                            <span class="text-danger error-text  address_error "></span>
                                            </div>
                                    </div>
                            </div>
                        
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                  </div>
    
      
    
      </div>
  </div>
  <script>
      // this is for add new job 
  
      $(document).ready( function(){
        
        $("#create_job").on('submit',function(e){
  
            e.preventDefault();
  
            $.ajax({
  
                   url:$(this).attr('action'),
                   enctype: 'multipart/form-data',
                   method:$(this).attr('method'),
                   data:new FormData(this),
                   processData:false,
                   dataType:'json',
                   contentType:false,
                   beforeSend:function(){
  
                        $(document).find('span.error-text').text('')
                   },
                   success:function(data){
  
                        if(data.status == 401){
  
                            $.each(data.error,function(prefix,val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
  
                        }else if(data.status == 500){
  
                            Swal.fire(
                                        'Oppss...',
                                        data.message,
                                        'error'
                                );
  
  
                            window.location = "";
                        }else{
  
                          $('#create_job')[0].reset();
                          Swal.fire(
                                        'Good Job',
                                        data.message,
                                        'success'
                                );
  
  
                            window.location = "";
  
                        }
  
                   } 
  
            });
  
        });
  
  
    });
  
  
  
  
  
  
  
  
  
  
  
  
  
      $(document).ready(function() {
        $('#category-select').select2();
    });
      $(document).ready(function() {
        $('#location-select').select2();
    });
      $(document).ready(function() {
        $('#edit_location_id').select2();
    });
      $(document).ready(function() {
        $('#edit_job_category_id').select2();
    });
      $(document).ready(function() {
        $('#skill-select').select2();
    });
    </script>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '.edit_description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


{{-- <div class="container">

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

</div> --}}



@endsection