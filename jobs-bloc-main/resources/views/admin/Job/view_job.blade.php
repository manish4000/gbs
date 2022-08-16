@extends('layouts.app', ['activePage' => 'submit-job', 'titlePage' => __('View Job Details')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="{{route('admin.job.submit_job.index')}}" class="text-decoration-none text-reset ms-1">Jobs </a> <i class="fa-solid fa-caret-right"></i> </li>
      <li><a href="#" class="text-decoration-none text-reset ms-1">View </a></li>
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



    <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title "> Job Datails </h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                     Title
                    </th>
                    
                    <th>
                      Data
                    </th>
                  </thead>
                
    
                  <tbody>
                    <tr>
                        <th>Job Title</th>
                        <td>{{$job_data->title}}</td>
                    </tr>
                    <tr>
                        <th>Job Type</th>
                        <td>{{$job_data->job_type_id}}</td>
                    </tr>
                    <tr>
                        <th>Job Categories </th>
                        <td> @foreach ($job_categories as $category )
                              {{$category->title}},  
                          @endforeach()
                      </td>
                    </tr>
                    <tr>
                        <th>Job Locations </th>
                        <td>@foreach ($job_locations as $location )
                          {{$location->title}},  
                      @endforeach()</td>
                    </tr>
                    <tr>
                        <th>Job Description</th>
                        <td>{!!$job_data->description!!}</td>
                    </tr>
                    <tr>
                        <th>Job Feature Image</th>
                        <td><img src="{{APP_PATH.JOB_FEATURE_IMAGE_URL.$job_data->feature_image}}" alt="..." class="avatar img-raised" height="150" ></td>
                    </tr>
                    <tr>
                        <th>Job Application Deadline date</th>
                        <td>{{$job_data->application_deadline_date}}</td>
                    </tr>
                    <tr>
                        <th>Min Salary</th>
                        <td>{{$job_data->min_salary}}</td>
                    </tr>
                    <tr>
                        <th>Max Salary</th>
                        <td>{{$job_data->max_salary	}}</td>
                    </tr>
                    <tr>
                        <th>Job Salary Type </th>
                        <td>{{$job_data->salary_type_id }}</td>
                    </tr>
                    <tr>
                        <th>Job Tegs</th>
                        <td>{{$job_data->tegs}}</td>
                    </tr>
                    <tr>
                        <th>Job Address</th>
                        <td>{{$job_data->address}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td> @if($job_data->is_active == 1 ) 
                            <span class="badge badge-success p-1">Active</span>
                           @else
                           <span class="badge badge-danger p-1">Inactive</span>
                           @endif</td>
                    </tr>
                    <tr>
                        <th>Is Featured</th>
                        <td> @if($job_data->is_feature == 1 ) 
                            <span class="badge badge-success p-1">Featured</span>
                           @else
                           <span class="badge badge-danger p-1">Not</span>
                           @endif</td>
                    </tr>
                
                    <tr>
                        <th> Created At</th>
                        <td> {{$job_data->created_at}}</td>
                    </tr>
                
                    <tr>
                        <th>Updated At</th>
                        <td> {{$job_data->updated_at}}</td>
                    </tr>
                
        
                    
               
                   
                  </tbody>
               
              
  
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Salary Type </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.salary_type.store')}}"  method="POST" id="testimonial_create">
                      @csrf

                   
                    <div class="form-group">
                      <label class="mb-2" for="title">Title</label>
                      <input type="text" class="form-control" value="" name="title" required>
                      <span class="text-danger error-text  title_error "></span>
                    </div>
                  
                    <div class="form-group">
                    <label class="mb-2" for="">Is Active</label>
                    <select name="is_active" id="" class="form-control" required> 
                      <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="text-danger error-text  is_active_error "></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Salary Type </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.salary_type.store')}}"  method="POST" id="update_testimonial" enctype="multipart/form-data">
                      @csrf
                  
                      <div class="form-group">
                        
                        <label for="title">title</label>

                        <input type="hidden" title="id" id="edit_id" name="id">

                        <input type="text" class="form-control" id="edit_title" value="" name="title" required>
  
                        <span class="text-danger error-text  title_error "></span>
                      </div>
                   
             
                  
                    <div class="form-group">
                    <label for="">Is Active</label>
                    <select name="is_active" id="edit_is_active" class="form-control" required> 
                      <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                    <span class="text-danger error-text  is_active_error "></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Salary Type</h5>
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

          url:  "{{APP_PATH}}" + "admin/job/salary-type/edit/"+testimonial_id,

         
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
                 $('#edit_title').val(response.salary_type_data.title);
                 $('#edit_is_active').val(response.salary_type_data.is_active);

              }  
            

          }

      });

      });






</script>



@endsection




