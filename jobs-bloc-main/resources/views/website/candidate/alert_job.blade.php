@extends('website.layout')

@section('content')

<div class="container">

        <div class="row">

            <div class="col-12 col-md-3">
              @include('website.candidate.layout')
            </div>


            <div class="col-12 col-md-9  py-4 ">


                    <div class="g-0">
                        <h3 class=" fw-bold  my-4">Alert Jobs</h3>
            
                        <form class="col-4 text-center ">
                            <div class="input-group  mb-3">
                            <input type="text" class="form-control rounded-0 p-3" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary rounded-0" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                
                        </form>  
            
                    </div>

                    <div class="border">
                        <table class="table caption-top table-borderless">
                             
                                <thead class="border bg-light">

                                    
                                    <tr>                         
                                        <th scope="col" class="p-4">Title</th>
                                        <th scope="col" class="p-4">Alert Query</th>
                                        <th scope="col" class="p-4">Number Jobs</th>
                                        <th scope="col" class="p-4">Times</th>
                                        <th scope="col" class="p-4">Actions</th>
                                    </tr>
                                

                                </thead>
                                <tbody>
                                    @for($i=1;$i<=6;$i++)
                                        <tr>
                                        <td class="p-4"> test</td>
                                        <td class="p-4">Otto</td>
                                        <td class="p-4">@Jobs found 1797</td>
                                        <td class="p-4">Daily</td>
                                        <td class="p-4">
                                            <a href="#" class="bg-light p-1 rounded text-decoration-none text-danger">  <span><i class="fa fa-trash-o" aria-hidden="true"></i></span> </a>
                                        </td>
                                        </tr>
                                        <tr>
                                    @endfor      
                                </tbody>
                        </table>
                        
                    </div>




            </div>



        </div>

</div>


@endsection