@extends('website.layout')

@section('content')

<div class="container-fluid  py-4 bg-light">

    <div class="container d-flex justify-content-between align-items-center">
        <h3>Contact Us</h3>
    
            <div>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
                </nav>
    
           </div>

    </div>
</div>
    
    <div class="container-fluid inquery py-5 ">


    <div class="container"> 

                
    <!--Section: Contact v.2-->
    <section class="mb-4">

                
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-8 mb-md-0 mb-5 p-3 border">
                        <form id="contact_us_create" name="contact-form" action="{{route('contact_us')}}" method="POST" class="p-3">
                                @csrf
                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label fs-5">Enter Your Name</label>

                                            <input type="text" id="name" name="name" class="form-control p-2">
                                            <span class="text-danger error-text name_error "></span>
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label fs-5">Enter Your Email</label>
                                            <input type="text" id="email" name="email" class="form-control p-2">
                                            <span class="text-danger error-text email_error "></span>
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label fs-5">Enter Your Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control p-2">
                                            <span class="text-danger error-text subject_error "></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                        <label for="" class="form-label fs-5">Enter Message</label>
                                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea p-2"></textarea>
                                            
                                            <span class="text-danger error-text message_error "></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row my-2">

                                    <!--Grid column-->
                                    <div class="col-md-12 pt-3">

                                        <div class="md-form text-center">
                                        <input type="submit" id="subject" name="subject" class="btn btn-lg btn-outline-warning " >
                                    
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->



                            </form>
                            
                    
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-4 text-center py-5">
                            <ul class="list-unstyled mb-0">
                                
                                <li><i class="fas fa-map-marker-alt "></i>
                                    <p class="fs-5"> Goregaon east,royal palms,Mumbai,Maharashtra</p>
                                </li>

                                <li><i class="fas fa-phone mt-4 "></i>
                                    <p class="fs-5" >7525975790</p>
                                </li>

                                <li><i class="fas fa-envelope mt-4 "></i>
                                    <p class="fs-5"> <a href="mailto:info@jobsbloc.com" class="text-decoration-none text-reset" > info@jobsbloc.com</a></p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                    </div>

    </section>


    </div>



  </div>



  <script>
            
    $(document).ready( function(){
          
          $("#contact_us_create").on('submit',function(e){
    
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
    
                          }else if(data.status == 500){
    
                            Swal.fire(
                                        'Oops...',
                                         data.message,
                                        'error'
                                );
                          }else if(data.status == 200){
    
                      
    
                            $('#contact_us_create')[0].reset();
    
                            Swal.fire(
                                            'Good job!',
                                            data.message,
                                            'success'
                                ); 
    
                          window.location = "" 
                                
                          }
    
                     } 
    
              });
    
          });
      });
    
    
        </script>    



@endsection