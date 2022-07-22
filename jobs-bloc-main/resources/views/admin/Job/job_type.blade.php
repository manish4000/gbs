@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Job type')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">


    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Job Type </a></li>
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



    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_testimonial">Add New Job Type</button>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "> Job Types </h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID </th>
                  <th>
                   Title
                  </th>
                  
                  <th>
                    Action
                  </th>
                </thead>
                @if (isset( $job_type_data))
  
                <tbody>
               
              
      
                      @foreach ($job_type_data as $data)
                    <tr>
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
                        
                    </tr>
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



      $(document).on('click','.edit_testimonial',function(e){

        e.preventDefault();

        let testimonial_id = $(this).val();
        
        console.log(testimonial_id);
     
          $.ajax({

          type:"GET",

          url:  "{{APP_PATH}}" + "admin/job/job-type/edit/"+testimonial_id,

         
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
                 $('#edit_title').val(response.job_type_data.title);
                 $('#edit_is_active').val(response.job_type_data.is_active);

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
            url: "{{APP_PATH}}"+"admin/job/job-type/delete/"+delete_testimonial_id,
          

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

                        }else{

                            $('#testimonial_create')[0].reset();

                            Swal.fire(
                                        'Good job!',
                                        'Successfully Saved!',
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

                    console.log(data);

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




@endsection




