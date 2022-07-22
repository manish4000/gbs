@extends('layouts.app', ['activePage' => 'map', 'titlePage' => __('Locations')])

@section('content')



<!--  -->

<div class="content">
  <div class="container-fluid">

    <ol class="breadcrumb bg-white d-flex justify-content-start  ">
      <li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
       
      <li><a href="#" class="text-decoration-none text-reset ms-1">inquery</a></li>
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
            <h4 class="card-title "> Inquery </h4>
            <p class="card-category"> Inquery Data</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>ID </th>
                  <th>Name</th>
                  <th>Email</th>
                  
                  <th>Subject</th>
                  <th>Messasge</th>
                  <th>
                    Action
                  </th>
                </thead>
                @if (isset( $inquery_data))
  
                <tbody>
               
              
      
                      @foreach ($inquery_data as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                       
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->subject}}</td>
                        <td>{{$data->message}}</td>
                        
                        @if($data->is_replied =='1')
                        
                        <td>  <span class="badge badge-success">Replyed</span> </td>
                        
                        @else
                        <td><span class="badge badge-danger">Not Reply</span></td>
                        
                        @endif          
                        <td  style="width: 220px;">
                            <a href="{{route('admin.location.status',$data->id)}}" class="btn btn-warning btn-sm" >Reply</a>
                            <button type="button" data-toggle="modal" data-target="#edit_testimonial" class="edit_testimonial   btn btn-info btn-sm"  value="{{$data->id}}" >View</button>
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













<!-- edit model box -->

<div class="modal fade" id="edit_testimonial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Reply Mail </h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <section class="vh-60" style="background-color: #f4f5f7;">
          <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col col-lg-12 mb-12 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                  <div class="row g-0">
                   
                    <div class="col-md-12">
                      <div class="card-body p-4">
                        <h6>Inquery Details</h6>
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-6 mb-3">
                            <h6 >Name</h6>
                            <p class="text-muted"  id="edit_name" ></p>
                          </div>
                          <div class="col-6 mb-3">
                            <h6>Email </h6>
                            <p class="text-muted" id="edit_email" > </p>
                          </div>
                        </div>

                        <div class="row pt-1">
                          <div class="col-6 mb-3">
                                <h6>subject</h6>
                              <p class="text-muted"  id="edit_subject" > </p>
                          </div>
                          <div class="col-6 mb-3">
                           <h6>Created ON</h6>
                            <p class="text-muted"  id="edit_create_at"></p>
                          </div>
                        </div>                   
                        <hr class="mt-0 mb-4">
                        <div class="row pt-1">
                          <div class="col-12 mb-3">
                            <h6>Message</h6>
                            <p class="text-muted" id="edit_message" ></p>
                            <hr class="mt-0 mb-4">
                          </div>
                        </div>

                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</section>
                    
                <div class="container py-5 px-5 bg-light" >
                  <h4>Reply Mail</h4>
                  <form action=""  method="POST" id="update_testimonial" enctype="multipart/form-data" class="bg-white">
                      @csrf
                      
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="edit_message" value="" placeholder="enter  Message" name="message"rows="4"></textarea>
                     
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Location</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> </button>
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

          url:  "{{APP_PATH}}" + "admin/contact-us/view/"+testimonial_id,

         
          success:function(response){

             
              if(response.status == 404){
                 
                Swal.fire(
                                        response.message,
                                        'sas',
                                        'asa'
                                );
              }else{

                  console.log(response);

                document.getElementById('edit_name').innerText = response.data.name;
                document.getElementById('edit_email').innerText = response.data.email;
                document.getElementById('edit_subject').innerText = response.data.subject;
                document.getElementById('edit_message').innerText = response.data.subject;
                document.getElementById('edit_create_at').innerText = response.data.created_at;
               
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
            url: "{{APP_PATH}}"+"admin/contact-us/delete/"+delete_testimonial_id,
          

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




