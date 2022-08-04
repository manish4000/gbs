@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Job type')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="{{route('admin.job.submit_job.index')}}" class="text-decoration-none text-reset ms-1">Jobs </a> <i class="fa-solid fa-caret-right"></i></li>
      <li><a href="#" class="text-decoration-none text-reset ms-1">Edit  </a></li>
    </ol>

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
                    <form action="{{route('admin.job.submit_job.store')}}"  method="POST" id="edit_job" enctype="multipart/form-data">
                        @csrf
  
                     
                      <div class="form-group">
                        <label class="mb-2" for="title">Title</label>
                        <input type="hidden" name="id" value="{{$job_data->id}}">
                        <input type="text" class="form-control" name="title" value="{{$job_data->title}}" required>
                        <span class="text-danger error-text  title_error "></span>
                      </div>
                    
                      <div class="form-group">
                      <label class="mb-2" for="">Job type</label>
                      <select name="job_type_id" id="" value="{{$job_data->job_type_id}}" class="form-control" required> 
  
                          @foreach ($job_types as $type)
                          <option value="{{$type->id}}">{{$type->title}}</option>
                          @endforeach
                       
                      </select>
                      <span class="text-danger error-text  job_type_id_error "></span>
                      </div>
  
                      <div class="form-group">
                      <label class="mb-2" for="">Job Category </label>
                      <select name="job_category_id[]" id="category-select" class="form-control" multiple required> 
  
                          @foreach ($job_categories as $type)
                          
                          <option value="{{$type->id}}" <?php if(in_array($type->id ,$selected_job_categories) ){ echo "selected"; } ?> > {{$type->title}}</option>
  
                          @endforeach
                       
                      </select>
                      <span class="text-danger error-text  job_category_id_error "></span>
                      </div>
  
                      <div class="form-group">
                      
                      <label class="mb-4" for=""></label>
                      <textarea name="description"  class="form-control mt-3" id="editor1" cols="30" rows="5" placeholder="Description">
                        {!! $job_data->description !!}
                      </textarea>
                      <span class="text-danger error-text  description_error "></span>
                      </div>
  
           
                      <div class="form-group form-file-upload form-file-multiple">
                          <input type="file" multiple="false" name="feature_image" class="inputFileHidden" style="z-index:423522">
                          <div class="input-group">
                              <input type="text" class="form-control inputFileVisible" placeholder="Feature Image">
                              <span class="input-group-btn">
                                  <button type="button" class="btn btn-fab btn-round btn-primary">
                                      <i class="material-icons">attach_file</i>
                                  </button>
                              </span>
                             
                          </div>
                          <span class="text-danger error-text  feature_image_error "></span>
                      </div>  
  
                      
                      <div class="form-group">
                          <label class="mb-2" for="title">Application Deadline Date</label>
                          <input type="date" class="form-control" value="{{date('Y-m-d',strtotime($job_data->date))}}" name="application_deadline_date" required>
                          <span class="text-danger error-text  application_deadline_date_error "></span>
                      </div>
  
                      <div class="form-group">
                          <label class="mb-2" for="title">Min Salary</label>
                          <input type="text" class="form-control" value="{{$job_data->min_salary}}" name="min_salary" required>
                          <span class="text-danger error-text  min_salary_error "></span>
                      </div>
                      <div class="form-group">
                          <label class="mb-2" for="title">Max Salary</label>
                          <input type="text" class="form-control" value="{{$job_data->max_salary}}" name="max_salary" required>
                          <span class="text-danger error-text  max_salary_error "></span>
                      </div>
                        
                      <div class="form-group">
                        <label class="mb-2" for="">Salary Type </label>
                        <select name="salary_type_id"  class="form-control " value="{{$job_data->salary_type_id}}"  required> 
    
                            @foreach ($salary_type as $type)
                            
                            <option value="{{$type->id}}">{{$type->title}}</option>
    
                            @endforeach
                         
                        </select>
                        <span class="text-danger error-text  salary_type_id_error "></span>
                        </div>
  
                      <div class="form-group">
                        <label class="mb-2" for="">Location  </label>
                        <select name="location_id[]" id="location-select" value=""  class="form-control "  required multiple> 
    
                            @foreach ($location as $type)
                    
                            <option value="{{$type->id}}" <?php if(in_array($type->id ,$selected_job_locations) ){ echo "selected"; } ?> > {{$type->title}}</option>
    
                            @endforeach
                         
                        </select>
                        <span class="text-danger error-text  location_id_error "></span>
                      </div>
  
                      <div class="form-group">
                      
                        <label class="mb-4" for=""></label>
                        <textarea name="address"  class="form-control mt-3" id="editor1" cols="30" rows="5" placeholder="address">{!!$job_data->address!!}</textarea>
                        <span class="text-danger error-text  address_error "></span>
                      </div>
  
                      <div class="form-group">
                        <label class="mb-2" for="">Is Active  </label>
                        <select name="is_active"  class="form-control"value="{{$job_data->is_active}}"  required>                        
                            <option value="0">In Active</option>
                            <option value="1">Active</option>
    
                        </select>
                        <span class="text-danger error-text  is_active _error "></span>
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
@endsection
  
  <!-- end model -->