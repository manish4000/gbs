@extends('website.layout')




@section('content')

<div class="container">

        <div class="row">
            <div class="col-12 col-md-3">
              @include('website.employer.layout')
            </div>


            <div class="col-12 col-md-9  py-4 px-3">

                <div class="px-4 py-2 border ">
                        <h4 class="my-4">Edit Profile</h4>
                    <form class="row g-3" action="{{route('employer.profile.update')}}" method="POST" id="profile_update" enctype="multipart/form-data">

                      @csrf
                                <div class="col-md-6">
                                    <label class="form-label">Logo Image</label>
                                    <input type="file" class="form-control p-3" name="logo_image" id="logo_image"  >
                                </div>
                                <div class="col-md-6">
                                  <img id="logo_image-preview-image-before-upload" src="<?php echo  isset($employer_details->logo_image) ? APP_PATH.EMPLOYER_LOGO_IMAGE_URL.$employer_details->logo_image : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' ?> "   alt="preview image" style="max-height: 100px;" />
                               </div>
                                <div class="col-md-6">
                                    <label class="form-label">Cover Photo</label>
                                    <input type="file" class="form-control p-3"  name="cover_image" id="cover_image">
                                </div>
                                <div class="col-md-6 ">
                                  <img id="cover_image-preview-image-before-upload" src="<?php echo  isset($employer_details->cover_image) ? APP_PATH.EMPLOYER_COVER_IMAGE_URL.$employer_details->cover_image : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' ?>"
                                      alt="preview image" style="max-height: 100px;">
                              </div>

                                <div class="col-md-6">
                                    <label class="form-label">Company</label>
                                    <input type="text" class="form-control p-3" name="company" value="{{($user_details->company)?? '' }}" >
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Founded Date</label>
                                    <input type="date" class="form-control p-3"  name="founded_date"value="{{($employer_details->founded_date)?? '' }}" >
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control p-3" name="email" value="{{($user_details->email)?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Website</label>
                                    <input type="url" class="form-control p-3"  name="website" value="{{($employer_details->website)?? '' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control p-3" name="phone" value="{{($user_details->phone)?? '' }}" >
                                </div>
                                <div class="col-md-12">

                                  <?php  $selected =  explode(',',$employer_details->employer_job_categories) ?>
                                    <label class="form-label">Categories</label>
                                    <select id="" class="abc" multiple name="employer_job_categories[]" >
                                    
                                      @foreach($job_categories as $category)   
                                       <option value="{{$category->id}}" {{(in_array($category->id ,$selected) ? 'selected' : '' )}}>{{$category->title}}</option>
                                       @endforeach
                                      
                                      </select>
                                </div>
                               
                                <div class="col-md-6">
                                    <label class="form-label">Introduction Video URL</label>
                                    <input type="text" class="form-control p-3" name="introduction_video_url" value="{{($employer_details->introduction_video_url)?? '' }}">
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Description</label>                       
                                     <textarea class="form-control" id="editor" name="description" rows="5" >{{($employer_details->description) ?? '' }} </textarea>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Locations</label>                       
                                    <select name="location_id"  value="{{($employer_details->location_id)?? '' }}" class="form-control p-3">
                                      @foreach($locations as $location)
                                        <option value="{{$location->id}}"> {{ $location->title}}</option>
                                      @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-md-12 ">
                                    <label class="form-label">Friendly Address</label>                       
                                    <input type="text" class="form-control p-3" name="friendly_address" value="{{($employer_details->friendly_address)?? '' }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Profile  Photo</label>
                                    <input type="file" class="form-control p-3" name="profile_image" id="profile_image">
                                </div>
                                <div class="col-md-6">
                                  <img id="profile_image-preview-image-before-upload" src="<?php echo  isset($employer_details->profile_image) ? APP_PATH.EMPLOYER_PROFILE_IMAGE_URL.$employer_details->profile_image : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' ?> "   alt="preview image" style="max-height: 100px;" />
                               </div>


                                <label id="social" class="form-label ">Socials</label> 
                                
                                <div class="accordion" id="accordionExample">
                                      <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingOne">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#social" aria-expanded="false" aria-controls="social">
                                        Socials
                                      </button>
                                      </h2>
                                      <div id="social" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">

                                                    <div class="row">
                                                    <table class="table table-borderedless">
                                                      <tbody id="social_tab">
                                                        @foreach($user_social_networks as $user_network)
                                                            <tr>
                                                                <td>
                                                                    <label for="inputPassword4" class="form-label">Network</label>                       
                                                                    <select class="form-control p-2"  data-live-search="true"  name="network[]" >
                                                                        @foreach($social_networks as $network)
                                                                        <option value="{{$network->id}}" {{($network->id == $user_network->social_network_id)?'selected' : '' }}>{{$network->title}}</option>                                
                                                                        @endforeach
                                                                    </select>
                                                                </td>

                                                                <td>
                                                                    <label for="inputPassword4" class="form-label">Url</label>                       
                                                                    <input type="text" class="form-control p-2"  name="url[]" value="{{$user_network->url}}">
                                                                </td>

                                                                <td class="my-auto">

                                                                     <a href="#" class="btn btn-danger remove">Delete </a>
                                                                </td>
                                                            </tr>

                                                        @endforeach
                                                     </tbody>
                                                   </table>
                                                        <div>
                                                            <a href="#" class="btn btn-info addRow">add antoher network</a>
                                                        </div>

                                                    </div>

                                                </div>
                                     </div>
                                  </div>                                                               
                                </div>     
                                <label for="inputPassword4" id="social" class="form-label ">Team Members</label> 
                                
                                <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#team" aria-expanded="false" aria-controls="team">
                                    team
                                      </button>
                                    </h2>
                                    <div id="team" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">

                                                                           
                                          <div class="row">
                                                  <table class="table table-borderedless">
                                                          <tbody id="team_body">
                                                            @foreach($employer_team_details as $employer_team)
                                                                      <tr>
                                                                          <td>
                                                                              <div class="col-12 mb-2">
                                                                                 <label for="" class="text-samll ps-1"> <small>Name </small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_name[]" placeholder="name"  value="{{$employer_team->name}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Designation </small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_designation[]" placeholder="Designation"  value="{{$employer_team->designation}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Experience </small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_experience[]" placeholder="Experience"  value="{{$employer_team->name}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Profile Image</small> </label>
                                                                                <input type="file" class="form-control p-2"  name="mamber_profile_image[]" placeholder=" Profile Image">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                                                                                      
                                                                                <img id="team_image-preview-image-before-upload" src="<?php echo  isset($employer_team_details->profile_image) ? APP_PATH.EMPLOYER_TEAM_IMAGE_URL.$employer_team_details->profile_image : 'https://t4.ftcdn.net/jpg/04/70/29/97/360_F_470299797_UD0eoVMMSUbHCcNJCdv2t8B2g1GVqYgs.jpg' ?> "   alt="preview image" style="max-height: 100px;" />
                                                                              </div>

                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Facebook Url</small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_facebook[]" placeholder=" Facebook Url"  value="{{$employer_team->facebook}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Twitter Url</small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_twitter[]" placeholder="Twitter Url"  value="{{$employer_team->twitter}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Linkedin Url</small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_linkedin[]" placeholder="Linkedin Url"  value="{{$employer_team->linkedin}}"> 
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Instagram url</small> </label>
                                                                                <input type="text" class="form-control p-2"  name="mamber_instagram[]" placeholder=" Instagram url"  value="{{$employer_team->instagram}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <label for="" class="text-samll ps-1"> <small>Description  </small> </label>
                                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mamber_description[]">{{$employer_team->description}}                                                            
                                                                                </textarea>
                                                                              </div>
                                                                              
                                                                          </td>

                                                                          <td class="my-auto">
                                                                              <a href="#" class="btn btn-danger removeTeam">Delete </a>
                                                                          </td>

                                                                      </tr>
                                                              @endforeach          
                                                          </tbody>

                                                   </table>

                                                  <div>
                                                        <a href="#" class="btn btn-info addTeam">add antoher Mamber</a>
                                                  </div>

                                          </div>
                                               <!--  -->
                                               </div>
                                    </div>
                                  </div>
                                 
                                 
                                </div>
                                <div class="col-md-12 ">
                                    <label for="inputPassword4" class="form-label">Candidate Tags</label>                       
                                    <input type="text" class="form-control p-3" >
                                </div>
                                
                                <div class="col-12">
                                    <input type="submit" class="btn px-4 text-white fw-bold py-3 btn-warning" value="Submit ">
                                </div>
                    </form>           
                    
                </div>
                    

            </div>



        </div>

</div>

<script>

  $(document).ready(function() {
    $('.abc').select2();
  });
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


<script type="text/javascript">

    $('.addTeam').on('click',function(){
        addTeam();
    });

   
    
        function addTeam(){
                var team = '<tr>'+
                                                                          '<td>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Name </small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_name[]" placeholder="name">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Designation</small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_designation[]" placeholder="Designation">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Experience</small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_experience[]" placeholder="Experience">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Profile Image </small> </label>'+
                                                                                '<input type="file" class="form-control p-2"  name="mamber_profile_image[]" placeholder=" Profile Image">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Facebook Url </small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_facebook[]" placeholder=" Facebook Url">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Twitter Url</small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_twitter[]" placeholder="Twitter Url">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Linkedin Url</small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_linkedin[]" placeholder="Linkedin Url">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Instagram url</small> </label>'+
                                                                                '<input type="text" class="form-control p-2"  name="mamber_instagram[]" placeholder=" Instagram url">'+
                                                                              '</div>'+
                                                                              '<div class="col-12 mb-2">'+
                                                                                ' <label for="" class="text-samll ps-1"> <small>Description </small> </label>'+
                                                                                '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mamber_description[]">'+'Description'+                                                            
                                                                                '</textarea>'+
                                                                              '</div>'+
                                                                              
                                                                          '</td>'+

                                                                          '<td class="my-auto">'+

                                                                              '<a href="#" class="btn btn-danger removeTeam">' +'Delete'+ '</a>'+
                                                                          '</td>'+
                                                                      '</tr>' ;



                        
                          $('#team_body').append(team);              
        };



        $('tbody').on('click','.removeTeam',function(){
            $(this).closest("tr").remove();
        });




    
    $('.addRow').on('click',function(){
            addRow();
        });

        function addRow(){
                var social =  '<tr>'+
                                                                '<td>'+
                                                                '<label for="inputPassword4" class="form-label">Network</label>'+                       
                                                                '<select class="form-select p-2" aria-label="Default select example" name="network[]">'+
                                                                '@foreach($social_networks as $network)'+
                                                                        '<option value="{{$network->id}}">{{$network->title}}</option>'+                                
                                                                        '@endforeach'+
                                                                '</select>'+
                                                                '</td>'+

                                                                '<td>'+
                                                                '<label for="inputPassword4" class="form-label">Url</label>'+                       
                                                                '<input type="text" class="form-control p-2"  name="url[]">'+
                                                                '</td>'+
                                                                '<td class="my-auto">'+
                                                                    '<a href="#" class="btn btn-danger remove">Delete </a>'+
                                                                '</td>'+
                                                                '</tr>';

                          $('#social_tab').append(social);              
        };


        $('tbody').on('click','.remove',function(){
            $(this).closest("tr").remove();
        });

</script>
{{-- update data  --}}
<script>


$("#profile_update").on('submit',function(e){

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
  
              }else if(data.status == 200){
  
                  Swal.fire(
                              'Good job!',
                              data.message,
                              'success'
                      );
  
               window.location = "";
  
              }else if(data.status == 500){
  
                Swal.fire(
                              'Oops...',
                              'Something went wrong!',
                              'error'
                      );
  
               window.location = ""     
  
              }
  
          } 
  
  
  
  });
  
  });

</script>

{{--  --}}

<script type="text/javascript">
      
  $(document).ready(function (e) {
   
     
     $('#logo_image').change(function(){
              
      let reader = new FileReader();
   
      reader.onload = (e) => { 
   
        $('#logo_image-preview-image-before-upload').attr('src', e.target.result); 
      }
   
      reader.readAsDataURL(this.files[0]); 
     
     });

     $('#profile_image').change(function(){
              
      let reader = new FileReader();
   
      reader.onload = (e) => { 
   
        $('#profile_image-preview-image-before-upload').attr('src', e.target.result); 
      }
   
      reader.readAsDataURL(this.files[0]); 
     
     });
     
     $('#cover_image').change(function(){
              
      let reader = new FileReader();
   
      reader.onload = (e) => { 
   
        $('#cover_image-preview-image-before-upload').attr('src', e.target.result); 
      }
   
      reader.readAsDataURL(this.files[0]); 
     
     });

     $('#team_image').change(function(){
              
      let reader = new FileReader();
   
      reader.onload = (e) => { 
   
        $('#team_image-preview-image-before-upload').attr('src', e.target.result); 
      }
   
      reader.readAsDataURL(this.files[0]); 
     
     });
     
  });
   
  </script>
  





@endsection