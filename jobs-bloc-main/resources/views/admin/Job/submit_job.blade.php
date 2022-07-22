@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Job type')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Jobs </a></li>
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



    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_testimonial">Add New Job </button>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "> Jobs </h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              
                @if (isset( $job_list))
  
                <tbody>
               
              
      
                      @foreach ($job_list as $data)
                    {{-- <tr>
                        <td>{{ $data->id }}</td>
                       
                        <td>{{$data->title}}</td>
                        
                        @if($data->is_active =='1')
                        
                        <td>  <span class="badge badge-success">Active</span> </td>
                        
                        @else
                        <td><span class="badge badge-danger">Inactive</span></td>
                        
                        @endif          
                        <td  style="width: 220px;">
                            <a href="{{route('admin.job.job_type.status',$data->id)}}" class="btn btn-warning btn-sm" >Status</a>
                            <button type="button" data-toggle="modal" data-target="#edit_testimonial" class="edit_testimonial   btn btn-primary btn-sm"  value="{{$data->id}}" >Edit</button>
                            <button type="button" data-toggle="modal" data-target="#delete_testimonial" class="delete_testimonial   btn btn-danger btn-sm" value="{{$data->id}}" >Delete</button>
                         </td>
                        
                    </tr> --}}



                    <div class="card bg-dark">

                      <div class="card-body">

                        <div class="row">

                            <div class="col-8">

                                <div class="row">
                                    <div class="col-4 text-warning fw-bold"> <h5> Job Title : {{$data->title}} </h5></div>
                                    <div class="col-4">Job Type : {{$data->job_type_id}}  </div>
                                    <div class="col-4">Job Location : {{$data->location_id }}  </div>
                                </div>
                                <div class="row">
                                    <div class="col-4"> Deadline Date: {{$data->application_deadline_date}}</div>
                                    <div class="col-4">Min salary: {{$data->min_salary}}  </div>
                                    <div class="col-4">Max Salary : {{$data->max_salary }}  </div>
                                </div>
                               
                                <div class="row">
                                  <div class="col-4"> Salary Type: {{$data->salary_type_id}} </div>

                                  <div class="col-4">Status : @if($data->is_active == 1 ) 
                                                              <span class="badge badge-success p-1">Active</span>
                                                             @else
                                                             <span class="badge badge-danger p-1">Inactive</span>
                                                             @endif
                                  </div>
                               
                                    <div class="col-4"> Is Feature : @if($data->is_feature == 1 ) 
                                      <span class="badge badge-success p-1">Active</span>
                                     @else
                                     <span class="badge badge-danger p-1">Inactive</span>
                                     @endif </div>
                                   
                                   
                                </div>
                                <div class="row">
                                    
                                  <div class="col-4">Address: {{ $data->address}}  </div>
                                  <div class="col-4">Description: {{ strip_tags($data->description)}}  </div>
                                </div>
      
                                      
                                      

                          </div>
                          <div class="col-2">
                            <div class="col-4"> <img src="{{APP_PATH.JOB_FEATURE_IMAGE_URL.$data->feature_image}}" alt="..." class="avatar img-raised" height="100" ></div>
                          </div>
                          <div class="col-2">
                            <a href="{{route('admin.job.submit_job.status',$data->id)}}" class="btn btn-warning btn-sm" >Status</a>
                            <a href="{{route('admin.job.submit_job.featured',$data->id)}}" class="btn btn-info btn-sm" > <i class="material-icons">star</i> Feature</a>
                            <button type="button" data-toggle="modal" data-target="#edit_testimonial" class="edit_testimonial   btn btn-primary btn-sm"  value="{{$data->id}}" > <i class="material-icons px-1">edit </i>Edit</button>
                            <button type="button" data-toggle="modal" data-target="#delete_testimonial" class="delete_testimonial   btn btn-danger btn-sm" value="{{$data->id}}" ><i class="material-icons">delete</i> Delete</button>
                          </div>

                      </div>

                    </div>

                  </div>





                    @endforeach 
                 
                </tbody>
             
               @endif

              </table>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>




<!-- Button trigger modal -->












<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_testimonial" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Job  </h5>
        <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i class="material-icons">close</i> </a>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.submit_job.store')}}"  method="POST" id="testimonial_create" enctype="multipart/form-data">
                      @csrf

                   
                    <div class="form-group">
                      <label class="mb-2" for="title">Title</label>
                      <input type="text" class="form-control" value="" name="title" required>
                      <span class="text-danger error-text  title_error "></span>
                    </div>
                  
                    <div class="form-group">
                    <label class="mb-2" for="">Job type</label>
                    <select name="job_type_id" id="" class="form-control" required> 

                        @foreach ($job_types as $type)
                        
                        <option value="{{$type->id}}">{{$type->title}}</option>

                        @endforeach
                     
                    </select>
                    <span class="text-danger error-text  job_type_id_error "></span>
                    </div>

                    <div class="form-group">
                    <label class="mb-2" for="">Job Category </label>
                    <select name="job_category_id[]" id="category-select" class="form-control " multiple required> 

                        @foreach ($job_categories as $type)
                        
                        <option value="{{$type->id}}">{{$type->title}}</option>

                        @endforeach
                     
                    </select>
                    <span class="text-danger error-text  job_category_id_error "></span>
                    </div>

                    <div class="form-group">
                    
                    <label class="mb-4" for=""></label>
                    <textarea name="description"  class="form-control mt-3" id="editor1" cols="30" rows="5" placeholder="Description"></textarea>
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
                    </div>  

                    
                    <div class="form-group">
                        <label class="mb-2" for="title">Application Deadline Date</label>
                        <input type="date" class="form-control" value="" name="application_deadline_date" required>
                        <span class="text-danger error-text  application_deadline_date_error "></span>
                    </div>

                    <div class="form-group">
                        <label class="mb-2" for="title">Min Salary</label>
                        <input type="text" class="form-control" value="" name="min_salary" required>
                        <span class="text-danger error-text  min_salary_error "></span>
                    </div>
                    <div class="form-group">
                        <label class="mb-2" for="title">Max Salary</label>
                        <input type="text" class="form-control" value="" name="max_salary" required>
                        <span class="text-danger error-text  max_salary_error "></span>
                    </div>
                      
                    <div class="form-group">
                      <label class="mb-2" for="">Salary Type </label>
                      <select name="salary_type_id"  class="form-control "  required> 
  
                          @foreach ($salary_type as $type)
                          
                          <option value="{{$type->id}}">{{$type->title}}</option>
  
                          @endforeach
                       
                      </select>
                      <span class="text-danger error-text  salary_type_id_error "></span>
                      </div>

                    <div class="form-group">
                      <label class="mb-2" for="">Location  </label>
                      <select name="location_id"  class="form-control "  required> 
  
                          @foreach ($location as $type)
                          
                          <option value="{{$type->id}}">{{$type->title}}</option>
  
                          @endforeach
                       
                      </select>
                      <span class="text-danger error-text  location_id _error "></span>
                    </div>

                    <div class="form-group">
                    
                      <label class="mb-4" for=""></label>
                      <textarea name="address"  class="form-control mt-3" id="editor1" cols="30" rows="5">Address</textarea>
                      <span class="text-danger error-text  address_error "></span>
                    </div>

                    <div class="form-group">
                      <label class="mb-2" for="">Is Active  </label>
                      <select name="is_active"  class="form-control"  required>                        
                          <option value="0">In Active</option>
                          <option value="1">Active</option>
  
                      </select>
                      <span class="text-danger error-text  is_active _error "></span>
                    </div>
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>


</div>


<!-- end model -->


<!-- edit model box -->

<div class="modal fade" id="edit_testimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Job </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.submit_job.store')}}"  method="POST" id="update_testimonial" enctype="multipart/form-data">
                    @csrf

                 
                  <div class="form-group">
                    <label class="mb-2" for="title">Title</label>
                    <input type="hidden" name="id" id="edit_id">
                    <input type="text" class="form-control" id="edit_title" value="" name="title" required>
                    <span class="text-danger error-text  title_error "></span>
                  </div>
                
                  <div class="form-group">
                  <label class="mb-2" for="">Job type</label>
                  <select name="job_type_id" id="edit_job_type_id" class="form-control" required> 

                      @foreach ($job_types as $type)
                      
                      <option value="{{$type->id}}">{{$type->title}}</option>

                      @endforeach
                   
                  </select>
                  <span class="text-danger error-text  job_type_id_error "></span>
                  </div>

                  <div class="form-group">
                  <label class="mb-2" for="">Job Category </label>
                  <select name="job_category_id[]" id="edit_job_category_id"  class="form-control"  multiple="multiple" required> 

                      @foreach ($job_categories as $type)
                      
                      <option value="{{$type->id}}">{{$type->title}}</option>

                      @endforeach
                   
                  </select>
                  <span class="text-danger error-text  job_category_id_error "></span>
                  </div>

                  <div class="form-group">
                  
                  <label class="mb-4" for=""></label>
                  <textarea name="description"  class="form-control mt-3"  id="edit_description" cols="30" rows="5"></textarea>

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
                  </div>  

                  <div><img src="" alt="" id="edit_feature_image" height="150"></div>
                  
                  <div class="form-group">
                      <label class="mb-2" for="title">Application Deadline Date</label>
                      <input type="date" class="form-control" value="" id="edit_application_deadline_date" name="application_deadline_date" required>
                      <span class="text-danger error-text  application_deadline_date_error "></span>
                  </div>

                  <div class="form-group">
                      <label class="mb-2" for="title">Min Salary</label>
                      <input type="text" class="form-control" value="" id="edit_min_salary" name="min_salary" required>
                      <span class="text-danger error-text  min_salary_error "></span>
                  </div>
                  <div class="form-group">
                      <label class="mb-2" for="title">Max Salary</label>
                      <input type="text" class="form-control" value="" id="edit_max_salary" name="max_salary" required>
                      <span class="text-danger error-text  max_salary_error "></span>
                  </div>
                    
                  <div class="form-group">
                    <label class="mb-2" for="">Salary Type </label>
                    <select name="salary_type_id"  class="form-control" id="edit_salary_type_id"  required> 

                        @foreach ($salary_type as $type)
                        
                        <option value="{{$type->id}}">{{$type->title}}</option>

                        @endforeach
                     
                    </select>
                    <span class="text-danger error-text  salary_type_id_error "></span>
                    </div>

                  <div class="form-group">
                    <label class="mb-2" for="">Location  </label>
                    <select name="location_id"  class="form-control "  id="edit_location_id" required> 

                        @foreach ($location as $type)
                        
                        <option value="{{$type->id}}">{{$type->title}}</option>

                        @endforeach
                     
                    </select>
                    <span class="text-danger error-text  location_id _error "></span>
                  </div>

                  <div class="form-group">    
                    <label class="mb-4" for="">Address</label>
                    <textarea name="address"  class="form-control mt-3" id="edit_address" cols="30" rows="5"></textarea>
                    <span class="text-danger error-text  address_error "></span>
                  </div>

                  <div class="form-group">
                    <label class="mb-2" for="">Is Active  </label>
                    <select name="is_active"  class="form-control" id="edit_is_active"  required>                        
                        <option value="0">In Active</option>
                        <option value="1">Active</option>

                    </select>
                    <span class="text-danger error-text  is_active _error "></span>
                  </div>
                
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>


              </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>


</div>




<!-- edit model  -->


<!-- delete model -->

<div class="modal fade" id="delete_testimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Job Type</h5>
        <a type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> <i class="material-icons">close</i></a>
      </div>
        <div class="modal-body">

          <input type="hidden" id="delete_testimonial_id">
          <h4>Are you sure you want to delete this item </h4>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="delete_testimonial_btn  btn btn-danger">Delete</button>
      </div>
    </div>
  </div>


</div>







<script>



      $(document).on('click','.edit_testimonial',function(e){

        e.preventDefault();

        let testimonial_id = $(this).val();
        
        console.log(testimonial_id);
     
          $.ajax({

          type:"GET",

          url:  "{{APP_PATH}}" + "admin/job/submit-job/edit/"+testimonial_id,

         
          success:function(response){

             
              if(response.status == 404){
                 
                Swal.fire(
                                        response.message,
                                        'sas',
                                        'asa'
                                );
              }else{

                  console.log(response);

                 
                  $('#edit_id').val(testimonial_id);    
                  $('#edit_title').val(response.job_data.title);
                  $('#edit_feature_image').attr('src', "{{APP_PATH}}"+"{{JOB_FEATURE_IMAGE_URL}}"+response.job_data.feature_image);;
                  $('#edit_job_type_id').val(response.job_data.job_type_id);
                  $('#edit_job_category_id').val(response.job_data.job_category_id);
                  $('#edit_description').val(response.job_data.description);
                  $('#edit_application_deadline_date').val(response.job_data.application_deadline_date);
                  $('#edit_min_salary').val(response.job_data.min_salary);
                  $('#edit_max_salary').val(response.job_data.max_salary);
                  $('#edit_salary_type_id ').val(response.job_data.salary_type_id );
                  $('#edit_location_id ').val(response.job_data.location_id );
                  $('#edit_address').val(response.job_data.address);
                  $('#edit_is_feature').val(response.job_data.is_feature);
                  $('#edit_is_active').val(response.job_data.is_active);

              }  
            

          }

      });

      });

//on click on delete button 
      $(document).on('click','.delete_testimonial',function(e){

        e.preventDefault();
        let testimonial_id = $(this).val();
        
 
        $('#delete_testimonial_id').val(testimonial_id);
        $('#delete_testimonial').model('show');
      });

 
 
      $(document).on('click','.delete_testimonial_btn',function(e){

          e.preventDefault();
        
          var delete_testimonial_id = $('#delete_testimonial_id').val();

          $.ajax({

            type:"DELETE",
            url: "{{APP_PATH}}"+"admin/job/submit-job/delete/"+delete_testimonial_id,
          

            data:{'_token': '{{ csrf_token() }}' },
            success:function(response){

                if(response.status == 200 ){
                  Swal.fire(
                                        'Good job!',
                                         response.message,
                                        'success'
                             );           
                }
              window.location = "";
            }
          });
    });





      
    $(document).ready( function(){
      
        $("#testimonial_create").on('submit',function(e){

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



    $(document).ready( function(){

      $("#update_testimonial").on('submit',function(e){

          e.preventDefault();

          $.ajax({

                 url:$(this).attr('action'),
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

                      }else{

                          $('#update_testimonial')[0].reset();

                          Swal.fire(
                                      'Good job!',
                                      'Successfully update !',
                                      'success'
                              );
                          window.location = "";
                      }

                 } 



          });

      });


  });


</script>

<script>
  $(document).ready(function() {
    $('#category-select').select2();
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




