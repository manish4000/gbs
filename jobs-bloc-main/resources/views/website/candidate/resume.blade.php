@extends('website.layout')




@section('content')

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.candidate.layout')
            </div>


            <div class="col-12 col-md-9  py-4 px-3">

                <div class="px-4 py-2 border ">
                        <h4 class="my-4">Edit Resume</h4>
                    <form class="row g-3" method="POST" target="" action="{{route('candidate.resume.update')}}" id="update_resume">
                      @csrf
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">Portfolio Photos</label>
                                    <input type="file" class="form-control p-3" name="portfolio_photos[]" id="portfolio_photos" multiple>
                                    <span class="text-danger error-text  portfolio_photos_error "></span>
                                </div>
                                {{-- <div class="row">
                                   <div class="images-preview-div"> </div>
                                </div> --}}
                                
                                  
                                
                                <div class="col-md-12">
                                    <label for="inputPassword4" class="form-label">CV Attachment</label>
                                    <input type="file" name="cv"  class="form-control p-3" id="" value=" @isset($resume_details->cv){{$resume_details->cv}} @endisset">
                                    <span class="text-danger error-text  cv_error "></span>
                                    <p class="text-warning"> @isset($resume_details->cv) {{ $resume_details->cv}} @endisset </p>
                                </div>


                                <label for="inputPassword4" id="" class="form-label fw-bold">Education</label> 
                                <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#education" aria-expanded="false" aria-controls="education">
                                       Education
                                      </button>
                                    </h2>
                                    <div id="education" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">
                                          <!--  -->
                                          <div class="row">
                                                  <table class="table table-borderedless">
                                                      

                                                          <tbody id="education_body">

                                                              @foreach($candidate_education as $education)
                                                                      <tr>
                                                                          <td>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="text" class="form-control p-2" id="" name="ed_title[]" placeholder="title" value="{{$education->ed_title}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="text" class="form-control p-2" id="" name="ed_academy[]" placeholder="academy" value="{{$education->ed_academy}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="text" class="form-control p-2" id="" minlength="4" maxlength="4" name="ed_year[]" placeholder="year" value="{{$education->ed_year}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ed_description[]" >{{$education->ed_description}}</textarea>
                                                                              </div>
                                                                          </td>

                                                                          <td class="my-auto">
                                                                              <a href="#" class="btn btn-danger btn-sm removeEducation">Delete </a>
                                                                          </td>
                                                                      </tr>
                                                              @endforeach
                                                          </tbody>

                                                  </table>

                                                    <div> <a href="#" class="btn btn-info addEducation">add antoher Education</a> </div>
                                           </div>
                                          <!--  -->
                                      </div>
                                    </div>
                                  </div>
                                 
                                 
                                </div>




                                                                           
                                


                                <label for="inputPassword4" id="" class="form-label fw-bold">Experience</label> 

                                <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#experience" aria-expanded="false" aria-controls="experience">
                                    Experience
                                      </button>
                                    </h2>
                                    <div id="experience" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                      <div class="accordion-body">

                                                                           
                                          <div class="row">
                                                  <table class="table table-borderedless">
                                                          <tbody id="experience_body">

                                                              @foreach($candidate_experience as $experience)
                                                                      <tr>
                                                                          <td>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="text" class="form-control p-2" id="" name="ex_title[]" placeholder="title" value="{{$experience->ex_title}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="date" class="form-control p-2" id="" name="ex_start_date[]" placeholder="start_date" value="{{$experience->ex_start_date}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="date" class="form-control p-2" id="" name="ex_end_date[]" placeholder="end_date" value="{{$experience->ex_end_date}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">
                                                                                <input type="text" class="form-control p-2" id="" name="ex_company[]" placeholder="company" value="{{$experience->ex_company}}">
                                                                              </div>
                                                                              <div class="col-12 mb-2">   
                                                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ex_description[]">{{$experience->ex_description}}</textarea>
                                                                              </div>
                                                                          </td>

                                                                          <td class="my-auto">

                                                                              <a href="#" class="btn btn-danger btn-sm removeExperience">Delete </a>
                                                                          </td>
                                                                      </tr>

                                                              @endforeach
                                                          </tbody>

                                                   </table>

                                                  <div>
                                                        <a href="#" class="btn btn-info addExperience">add antoher Experience</a>
                                                  </div>

                                          </div>
                                               <!--  -->
                                               </div>
                                    </div>
                                  </div>
                                 
                                 
                                </div>

                                <label for="inputPassword4" id="" class="form-label fw-bold">Award</label> 

                                <div class="accordion" id="accordionExample">
                                  <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#award" aria-expanded="false" aria-controls="award">
                                    Award
                                      </button>
                                    </h2>
                                    <div id="award" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                                           
                                                  <div class="row">
                                                          <table class="table table-borderedless">
                                                                  <tbody id="award_body">

                                                                      @foreach($candidate_award as $award)
                                                                              <tr>
                                                                                  <td>
                                                                                      <div class="col-12 mb-2">
                                                                                        <input type="text" class="form-control p-2" id="" name="aw_title[]" placeholder="title" value="{{$award->aw_title}}">
                                                                                      </div>
                                                                                      <div class="col-12 mb-2">
                                                                                        <input type="year" class="form-control p-2" id="" minlength="4" maxlength="4" name="aw_year[]" value="{{$award->aw_year}}" placeholder="year">
                                                                                      </div>
                                                                                      <div class="col-12 mb-2">
                                                                                        
                                                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="aw_description[]" >{{$award->aw_description}}</textarea>
                                                                                      </div>
                                                                                  </td>

                                                                                  <td class="my-auto">

                                                                                      <a href="#" class="btn btn-danger btn-sm removeAward">Delete </a>
                                                                                  </td>
                                                                              </tr>
                                                                      @endforeach
                                                                  </tbody>

                                                          </table>

                                                          <div>  <a href="#" class="btn btn-info  addAward">add antoher Award</a>    </div>

                                                  </div>

                                             </div>
                                     </div>
                                  </div>
                                 
                                 
                                </div>

                                <label for="inputPassword4" id="" class="form-label fw-bold">Skill</label> 

                                  <div class="accordion" id="accordionExample">
                                      <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingOne">
                                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#skill" aria-expanded="false" aria-controls="skill">
                                        Skill
                                      </button>
                                      </h2>
                                      <div id="skill" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                              <div class="accordion-body">                                        
                                      <div class="row">
                                              <table class="table table-borderedless">
                                                   
                                                      <tbody id="skill_body">

                                                        @foreach($candidate_skill as $skill)
                                                                  <tr>
                                                                      <td>
                                                                          <div class="col-12 mb-2">
                                                                            <input type="text" class="form-control p-2" id="" name="sk_title[]" placeholder="title" value="{{$skill->sk_title}}">
                                                                          </div>
                                                                          <div class="col-12 mb-2">
                                                                            <input type="text" class="form-control p-2" id="" minlength="1" maxlength="3" name="sk_percentage[]" placeholder="Percentage" value="{{$skill->sk_percentage}}">
                                                                          </div>
                                                                      </td>

                                                                      <td class="my-auto">

                                                                          <a href="#" class="btn btn-danger btn-sm removeSkill">Delete </a>
                                                                      </td>
                                                                  </tr>
                                                      @endforeach
                                                      </tbody>

                                              </table>

                                              <div>
                                                    <a href="#" class="btn btn-info addSkill">add antoher Award</a>
                                              </div>

                                      </div>
                                
                                </div>
                                     </div>
                                  </div>
                                 
                                 
                                </div>

                                
                                
                                <div class="col-12">
                                    <button type="submit" class="btn px-4 text-white fw-bold py-3 btn-warning">Save Resume</button>
                                </div>
                    </form>           
                    
                </div>             

            </div>



        </div>

</div>



<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>


<script type="text/javascript">

        $('.addEducation').on('click',function(){
            addEducation();
        });
       

        function addEducation(){
                var tr =  '<tr>'+
                                                                '<td>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" name="ed_title[]" placeholder="title">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" name="ed_academy[]" placeholder="academy">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" minlength="4" maxlength="4" name="ed_year[]" placeholder="year">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                                '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ed_description[]" ></textarea>'+
                                                                    '</div>'+
                                                                '</td>'+

                                                                '<td class="my-auto">'+

                                                                     '<a href="#" class="btn btn-danger btn-sm removeEducation">Delete </a>'+
                                                                '</td>'+
                                                            '</tr>';



                        
                          $('#education_body').append(tr);              
        };

        $('tbody').on('click','.removeEducation',function(){
            $(this).closest("tr").remove();
        });


        $('.addExperience').on('click',function(){
            addExperience();
        });


        function addExperience(){

            var tr = '<tr>'
                                                                +'<td>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" name="ex_title[]" placeholder="title">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="date" class="form-control p-2" id="" name="ex_start_date[]" placeholder="start_date">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="date" class="form-control p-2" id="" name="ex_end_date[]" placeholder="end_date">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" name="ex_company[]" placeholder="company">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      
                                                                      '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ex_description[]">'+'</textarea>'+
                                                                    '</div>'+
                                                                '</td>'+

                                                                '<td class="my-auto">'+

                                                                     '<a href="#" class="btn btn-danger btn-sm removeExperience">Delete </a>'+
                                                                '</td>'+
                                                            '</tr>' ;

                $('#experience_body').append(tr); 

        }

        $('.addAward').on('click',function(){
            addAward();
        });


        
        function addAward(){

            var tr = '<tr>'+
                                                                '<td>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="text" class="form-control p-2" id="" name="aw_title[]" placeholder="title">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      '<input type="year" class="form-control p-2" id="" minlength="4" maxlength="4" name="aw_year[]" placeholder="year">'+
                                                                    '</div>'+
                                                                    '<div class="col-12 mb-2">'+
                                                                      
                                                                      '<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="aw_description[]">'+'</textarea>'+
                                                                    '</div>'+
                                                                '</td>'+

                                                                '<td class="my-auto">'+

                                                                     '<a href="#" class="btn btn-danger btn-sm removeAward">Delete </a>'+
                                                                '</td>'+
                                                            '</tr>';

                                            $('#award_body').append(tr);                   
        }

         $('tbody').on('click','.removeAward',function(){
            $(this).closest("tr").remove();
        });


        $('tbody').on('click','.removeExperience',function(){
            $(this).closest("tr").remove();
        });

        $('.addSkill').on('click',function(){
            addSkill();
        });


        function addSkill(){

            var tr = '<tr>'+
                                                                      '<td>'+
                                                                          '<div class="col-12 mb-2">'+
                                                                            '<input type="text" class="form-control p-2" id="" name="sk_title[]" placeholder="title">'+
                                                                          '</div>'+
                                                                          '<div class="col-12 mb-2">'+
                                                                            '<input type="text" class="form-control p-2" id="" minlength="1" maxlength="3" name="sk_percentage[]" placeholder="Percentage">'+
                                                                          '</div>'+
                                                                        
                                                                      '</td>'+

                                                                      '<td class="my-auto">'+

                                                                          '<a href="#" class="btn btn-danger btn-sm removeSkill">Delete </a>'+
                                                                      '</td>'+
                                                                  '</tr>' ;

                       $('#skill_body').append(tr);                                    


        }

      
       
        $('tbody').on('click','.removeSkill',function(){
            $(this).closest("tr").remove();
        });

        // $('tbody').on('click','.removeExperience',function(){
        //     $(this).closest("tr").remove();
        // });

</script>

<script>

$("#update_resume").on('submit',function(e){

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
<script type="text/javascript">
    $(function() {
// Multiple images preview with JavaScript
var previewImages = function(input, imgPreviewPlaceholder) {
if (input.files) {
var filesAmount = input.files.length;
for (i = 0; i < filesAmount; i++) {
var reader = new FileReader();
reader.onload = function(event) {
$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
}
reader.readAsDataURL(input.files[i]);
}
}
};



  $('#portfolio_photos').on('change', function() {
  previewImages(this, 'div.images-preview-div');
  });

 

});

</script>



@endsection