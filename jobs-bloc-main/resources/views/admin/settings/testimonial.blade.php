@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Map')])

@section('content')

{{-- 
<div>
  <ol class="breadcrumb bg-white d-flex justify-content-end  ">
		<li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
     
		<li><a href="#" class="text-decoration-none text-reset ms-1">Testmonial</a></li>
	</ol>

</div>

<div class="row">
  <div class="col-lg-12">
      <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_testimonial">Add New Testmonial</button>
  </div>
</div> --}}

<!-- check session -->

@if (\Session::has('status_update'))
    <script>
       Swal.fire(
                                        "Good Job",
                                        'Status is updated',
                                        'success'
                );
    </script>
@endif
@if (\Session::has('status_not_update'))
    <script>
       Swal.fire(
                                        "Goo",
                                        'Status is updated',
                                        'error'
                );
    </script>
@endif

<!--  -->

<div class="content">
  <div class="container-fluid">

   

    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">Testmonial</a></li>
    </ol>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#add_testimonial">Add New Testmonial</button>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title "> Testimonial </h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID </th>
                  <th>
                    Description
                  </th>
                  <th>
                    Image
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Designation
                  </th>
                  <th>
                    Star
                  </th>
                  <th>
                    Location
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                @if (isset( $testimonial_data))
  
                <tbody>
               
              
      
                      @foreach ($testimonial_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>
                            
                            {{ substr($data->description,0,80) }}
                          </td>
                        <td><img src="{{ APP_PATH.WEBSITE_TESTMONIAL_IMAGE.$data->image }}" width="150px"></td>
                        <td>{{ $data->name }}</td>
                        <td>{{$data->designation}}</td>
                        <td>{{$data->star}}</td>
                        <td>{{$data->location}}</td>
                        
                        @if($data->is_active =='1')
                        
                        <td>  <span class="badge badge-success">Active</span> </td>
                        
                        @else
                        <td><span class="badge badge-danger">Inactive</span></td>
                        
                        @endif          
                        <td  style="width: 220px;">
                  
      
                            <a href="{{route('admin.settings.testimonial.status',$data->id)}}" class="btn btn-warning btn-sm" >Status</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Testmonial</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.settings.testimonial.store')}}"  method="POST" id="testimonial_create" enctype="multipart/form-data">
                      @csrf

                   <div class="form-group">
                      <label class="mb-2" for="name">Name</label>
                      <input type="text" class="form-control" value="" name="name" required>

                      <span class="text-danger error-text  name_error "></span>
                    </div>
                  
                    <div class="form-group">
                      <label class="mb-2" for="description">Description</label>
                      <textarea name="description" id="" class="form-control" rows="3"></textarea>
                      
                      <span class="text-danger error-text description_error"></span>
                    </div>




                   
                    <div class="form-group form-file-upload form-file-multiple">
                      
                      <input type="file" multiple="false" name="image" class="inputFileHidden" style="z-index:423522">
                      <div class="input-group">
                          <input type="text" class="form-control inputFileVisible" placeholder="Single File">
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-fab btn-round btn-primary">
                                  <i class="material-icons">attach_file</i>
                              </button>
                          </span>
                      </div>
                    </div>
                  
                

                    <div class="form-group">
                      <label class="mb-2" for="designation">Designation</label>
                      <input type="text" class="form-control" value="" name="designation" required>
                      <span class="text-danger error-text  designation_error "></span>
                    </div>
                    <div class="form-group">
                      <label class="mb-2" for="star">Star</label>
                      <select name="star" id="" class="form-control" required> 

                      <option >Select</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>                      
                    </select>
                      <span class="text-danger error-text  star_error "></span>
                    </div>
                    <div class="form-group">
                      <label class="mb-2" for="location">Location</label>
                      <input type="text" class="form-control" value="" name="location" required>
                      <span class="text-danger error-text  location_error "></span>
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


                  <form>
                    <div class="form-group">
                      <label class="mb-2" for="exampleFormControlInput1">Email address</label>
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Testmonial </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                    
                <div class="container" >
                  <form action="{{route('admin.settings.testimonial.update')}}"  method="POST" id="update_testimonial" enctype="multipart/form-data">
                      @csrf
                  
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="hidden" name="id" id="edit_id">
                        <input type="text" class="form-control" id="edit_name" value="" name="name" required>
  
                        <span class="text-danger error-text  name_error "></span>
                      </div>
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea name="description" id="edit_description" class="form-control" rows="3"></textarea>
                      
                      <span class="text-danger error-text description_error"></span>
                    </div>
                  

                    <div class="form-group form-file-upload form-file-multiple">
                      
                      <input type="file" multiple="false" name="image" class="inputFileHidden" style="z-index:423522">
                      <div class="input-group">
                          <input type="text" class="form-control inputFileVisible" placeholder="Single File">
                          <span class="input-group-btn">
                              <button type="button" class="btn btn-fab btn-round btn-primary">
                                  <i class="material-icons">attach_file</i>
                              </button>
                          </span>

                          <span class="text-danger error-text image_error"></span>  
                      </div>
                    </div>



                   
                    <div><img src="" alt="" id="edit_image" height="200"></div>

                    <div class="form-group">
                      <label for="designation">Designation</label>
                      <input type="text" class="form-control" id="edit_designation" value="" name="designation" required>

                      <span class="text-danger error-text  designation_error "></span>
                    </div>

                    <div class="form-group">
                      <label for="star">Star</label>
                      <select name="star" id="edit_star" class="form-control" required> 
                        
                      <option >Select</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>                      
                    </select>
                      <span class="text-danger error-text  star_error "></span>
                    </div>

                    <div class="form-group">
                      <label for="location">Location</label>
                      <input type="text" class="form-control" value="" id="edit_location" name="location" required>
                      <span class="text-danger error-text  location_error "></span>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Testmonial</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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

          url:  "{{APP_PATH}}" + "admin/settings/testimonial/edit/"+testimonial_id,

         
          success:function(response){

             
              if(response.status == 404){
                 
                Swal.fire(
                                        response.message,
                                        'sas',
                                        'asa'
                                );
              }else{

                  console.log(response);

                 $('#edit_description').val(response.testimonial_data.description);
                 $('#edit_image').attr('src', "{{APP_PATH}}"+"{{WEBSITE_TESTMONIAL_IMAGE}}"+response.testimonial_data.image);
                 $('#edit_name').val(response.testimonial_data.name);
                 $('#edit_is_active').val(response.testimonial_data.is_active);
                 $('#edit_designation').val(response.testimonial_data.designation);
                 $('#edit_location').val(response.testimonial_data.location);
                 $('#edit_star').val(response.testimonial_data.star);
                 $('#edit_id').val(testimonial_id);    

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
            url: "{{APP_PATH}}"+"admin/settings/testimonial/delete/"+delete_testimonial_id,
          

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




