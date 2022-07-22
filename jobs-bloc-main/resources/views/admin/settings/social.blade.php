@extends('admin.layout')

@section('content')

<div>
<ol class="breadcrumb bg-white d-flex justify-content-end pe-4 ">
		<li><a href="{{URL::to('admin/dashboard')}}" class="text-decoration-none text-reset" ><i class="fa fa-dashboard"></i> Dashboard</a> <i class="fa-solid fa-caret-right"></i></li>
        
		<li><a href="#" class="text-decoration-none text-reset ms-1">Social</a></li>

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
                                
                          <h3 class="text-center"> Social Settings </h3>      


                <div class="container p-5 my-5 border p-3 " >

                  <form action="{{route('admin.settings.social.store')}}"  method="POST" id="update_website_social" enctype="multipart/form-data">

                      @csrf              

                    <div class="mb-3">
                                    <input type="hidden" class="form-control"  name="id" value="1">
                                    <label for="exampleFormControlTextarea1" class="form-label">Facebook</label>
                                    <input type="text" class="form-control"  name="facebook" value="{{$social_data->facebook}}">
                                    <span class="text-danger error-text facebook_error "></span>  
                    
                    </div>
                    <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{$social_data->instagram}}" >  
                                    <span class="text-danger error-text instagram_error "></span> 

                    </div>

                    <div class="mb-3">
                                
                                <label for="exampleFormControlTextarea1" class="form-label">Twitter</label>
                                 <input type="text" class="form-control" name="twitter"  value="{{$social_data->twitter}}">
                                <span class="text-danger error-text twitter_error "></span>

                    </div>
                    <div class="mb-3">
                                
                               <label for="exampleFormControlTextarea1" class="form-label">Linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{$social_data->linkdin}}" >
                                    <span class="text-danger error-text linkdin_error "></span>                        
                    
                    </div>

        
                    <div class="mb-3">

                        <button type="submit" class="btn btn-primary">Save & Update</button>
                    
                    </div>                                
                  </form>

              </div>



<!-- end model -->












<script>






    $(document).ready( function(){




      $("#update_website_social").on('submit',function(e){

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

@section('script')
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
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor4' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


@endsection


