@extends('admin.layout')

@section('content')

<div>
<ol class="breadcrumb bg-white d-flex justify-content-end pe-4 ">
		<li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
        
		<li><a href="#" class="text-decoration-none text-reset ms-1">Contact</a></li>

	</ol>
</div>

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
<!-- Button trigger modal -->


<!-- Modal -->
                                
                          <h3 class="text-center"> Contact Settings </h3>      


                <div class="container p-5 my-5 border p-3 " >

                  <form action="{{route('admin.settings.contact.store')}}"  method="POST" id="update_website_contact" >

                      @csrf              

                    <div class="mb-3">

                                    <input type="hidden" class="form-control"  name="id" value="1">
                                    <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                    <input type="email" class="form-control"  name="email" value="{{$contact_data->email}}">
                                    <span class="text-danger error-text email_error "></span>

                    
                    </div>
                    <div class="mb-3">
 
                                      <label for="exampleFormControlTextarea1" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$contact_data->phone}}" >  
                                    <span class="text-danger error-text phone_error "></span> 

                    </div>

                    <div class="mb-3">
                                
                                <label for="exampleFormControlTextarea1" class="form-label">Address</label>
                                 <input type="text" class="form-control" name="address"  value="{{$contact_data->address}}">
                                <span class="text-danger error-text address_error "></span>

                    
                    </div>

                    <div class="mb-3">

                        <button type="submit" class="btn btn-primary">Save & Update</button>
                    
                    </div>                                
                  </form>

              </div>



<!-- end model -->


<script>






    $(document).ready( function(){




      $("#update_website_contact").on('submit',function(e){

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




