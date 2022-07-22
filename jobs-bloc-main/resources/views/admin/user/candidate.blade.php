@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Candidates ')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Candidates </a></li>
    </ol>

       {{-- search box--}}

       <div class="bg-white ">
     
        <form action="{{route('admin.users.index')}}" method="GET" >
          <div class="form-row p-3">
            <div class="col">
              <input type="hidden" name="role" value="{{$user_role}}">
              <label for="exampleInputEmail1">Select Category</label>
              <select class="form-control" data-style="btn btn-link" id="category-select" name="category">
                <option></option>
                @foreach ($categories as $category )
                 <option value="{{$category->id}}"> {{$category->title}}</option>
               @endforeach  
              </select>
            </div>
            <div class="col">
              <label for="exampleInputEmail1">Select Location</label>
              <select class="form-control p-3" id="location-select" name="location">
                <option></option>
               @foreach ($locations as $location )
                 <option value="{{$location->id}}"> {{$location->title}}</option>
               @endforeach             
              </select>
            </div>
  
            <div class="col">
              <label for="exampleInputEmail1">Select Status</label>
              <select class="form-control p-3" id="status-select" name="status" >
                
               <option value="1">Active</option>
               <option value="0">In Active</option>
              </select>
            </div>
            <div class="col my-auto mx-auto">
              <input type="submit" value="Search" class="btn btn-primary" >
              </div>
          </div>
        </form>
  
      </div>
      {{-- search box--}}


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


{{-- 
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_testimonial">Add New Job Type</button> --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "> Candidates</h4>
            <p class="card-category"> Here is a candidate details</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID </th>
                  <th>Name</th>
                 
                  <th>
                   Email
                  </th>
                  <th>
                   Phone
                  </th>                 
                  <th>
                   Location
                  </th>                 
                  <th>Created At</th>
                  <th>Status</th>
                  <th>
                    Action
                  </th>
                </thead>
                @if (isset( $user_data))
  
                <tbody>
               
              
      
                      @foreach ($user_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->location}}</td>
                        <td>{{$data->created_at}}</td>
                        @if($data->is_active =='1')
                        
                        <td>  <span class="badge badge-success">Active</span> </td>
                        
                        @else
                        <td><span class="badge badge-danger">Inactive</span></td>
                        
                        @endif  
                        
                                  
                        <td  style="width: 220px;">
                             <a href="{{route('admin.users.status',['id'=> $data->id])}}" class="btn btn-warning btn-sm" >Status</a>
                             <a href="{{route('admin.users.profile',['id'=> $data->id])}}" class="btn btn-info btn-sm" >View Profile</a>
                           {{-- <button type="button" data-toggle="modal" data-target="#edit_testimonial" class="edit_testimonial   btn btn-primary btn-sm"  value="{{$data->id}}" >Edit</button> --}}
                            <button type="button" data-toggle="modal" data-target="#delete_testimonial" class="delete_testimonial   btn btn-danger btn-sm disabled" value="{{$data->id}}" >Delete</button>
                         </td>
                        
                    </tr>
                    @endforeach 
                 
                </tbody>
             
               @endif

              </table>
              {{$user_data->links('pagination::bootstrap-4')}}
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Job Type </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.job_type.store')}}"  method="POST" id="testimonial_create">
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Job Type </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.job.job_type.store')}}"  method="POST" id="update_testimonial" enctype="multipart/form-data">
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
            url: "{{APP_PATH}}"+"admin/job/applications/delete/"+delete_testimonial_id,
          

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




</script>


<script>
  $(document).ready(function() {
    $('#category-select').select2();
    $('#location-select').select2();
    $('#status-select').select2();
});

</script>

@endsection




