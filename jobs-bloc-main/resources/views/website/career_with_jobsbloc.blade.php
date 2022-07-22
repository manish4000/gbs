@extends('website.layout')

@section('content')

<div class="container-fluid  py-4 bg-light">

    <div class="container d-flex justify-content-between align-items-center">
        <h3>Career With Jobsbloc</h3>
    
            <div>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none text-reset">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Career with jobsbloc</li>
                </ol>
                </nav>
    
           </div>

    </div>
</div>
    
    <div class="container-fluid inquery py-5 ">


    <div class="container border-bottom border-2 border-dark"> 

                
    <!--Section: Contact v.2-->
    <section class="mb-4">

                
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-md-8 text-center py-2">
                                 <div class="accordion" id="accordionExample mb-3">
                                        <div class="accordion-item mb-4">
                                            <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color:#e1ad01;">
                                            Customer support associate
                                            </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse text-start " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                    <p>Position: 4</p>
                                                    <p>Work status:Full time,Work from home.</p>
                                                    <p>Experience:6 months atleast</p>
                                                    <p>Description:Giving calls to employers for which leads will be given and getting them on board.</p>
                                                    <p>Convincing expertise required.</p>
                                                  
                                            </div>
                                            </div>
                                        </div>
                                
                                 </div>
                               
                        </div>
                        <!--Grid column-->
               
                     
                        <!--Grid column-->

                          <!--Grid column-->
                          <div class="col-md-4 mb-md-0 mb-5 p-3 border">
                        <form id="career_with_jobsbloc" name="contact-form" action="{{route('store_career_with_jabsbloc')}}" method="POST" class="p-3">
                                @csrf
                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label "> Your Name</label>

                                            <input type="text" id="name" name="name" class="form-control p-1">
                                            <span class="text-danger error-text name_error "></span>
                                            
                                        </div>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label "> Your Email</label>
                                            <input type="text" id="email" name="email" class="form-control p-1">
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
                                        <label for="" class="form-label ">Apply For</label>
                                            <input type="text"  name="apply_for" class="form-control p-1">
                                            <span class="text-danger error-text apply_for_error "></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->
                                <!--Grid row-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                        <label for="" class="form-label ">Phone No</label>
                                            <input type="text" id="subject" name="phone" class="form-control p-1">
                                            <span class="text-danger error-text phone_error "></span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                        <label for="" class="form-label ">Your Message</label>
                                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea p-1"></textarea>
                                            
                                            <span class="text-danger error-text message_error "></span>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form">
                                        <label for="" class="form-label ">Cv/Resume</label>
                                           <input type="file" name="resume">
                                            <span class="text-danger error-text resume_error "></span>
                                        </div>

                                    </div>
                                </div>

                                <div class="row my-2">

                                    <!--Grid column-->
                                    <div class="col-md-12 pt-3">

                                        <div class="md-form text-center">
                                        <input type="submit" class="btn btn-outline-warning " >
                                    
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->



                            </form>
                            
                    
                        </div>
                        <!--Grid column-->



                    </div>

    </section>


    </div>



  </div>



  <script>
            
    $(document).ready( function(){
          
          $("#career_with_jobsbloc").on('submit',function(e){
    
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
    
                      
    
                            $('#career_with_jobsbloc')[0].reset();
    
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