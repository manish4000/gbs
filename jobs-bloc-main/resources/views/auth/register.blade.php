

@extends('website.layout')

@section('content')

<div class="container-fluid  py-4 bg-light">

    <div class="container d-flex justify-content-between align-items-center">
        <h3>Login/Register</h3>
    
            <div>
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-reset">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Login / Register</li>
                </ol>
                </nav>
    
           </div>

    </div>
</div>
    
    <div class="container-fluid inquery py-5 ">

   
         <x-jet-validation-errors class="mb-4 alert alert-danger" />
        

    <div class="container border-bottom border-2 border-dark"> 

                
    <!--Section: Contact v.2-->
    <section class="mb-4">

                
                    <div class="row">


                    <!--Grid column-->
                          <div class="col-md-5 mb-md-0 mb-5 p-4 ">

                                        <h4 class="text-center">Quick Login</h4>
                                        <p class="text-center">Login Your Account</p>
                                <div>
          
                                </div>

                                <form id="contact_us_create" name="contact-form" method="POST" action="{{route('login')}}" class="p-3">
                                        @csrf
                                        <!--Grid row-->
                                        <div class="row mb-3">
                                            <!--Grid column-->
                                            <div class="col-md-12">
                                                <div class="md-form mb-0">
                                                   <x-jet-input id="email" class="form-control p-2" type="text" name="email" :value="old('email')" required autofocus />
                                                   <span class="text-danger error-text email_error "></span>
                                                    
                                                </div>
                                            </div>
                                            <!--Grid column-->

                                        </div>
                                        <!--Grid row-->
                                        <!--Grid row-->
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="md-form mb-0">
                                                <x-jet-input id="password" class="form-control p-2" type="password" name="password" required autocomplete="current-password" />
                                                <span class="text-danger error-text password_error "></span>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <!--Grid row-->                   
                                        <div class="row">
                                            <!--Grid column-->
                                            <div class="col-md-12">

                                                <div class="mb-1 form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
                                                </div>
                                            </div>
        
                                        </div>
                                        <div class="row my-2">

                                            <!--Grid column-->
                                            <div class="col-md-12 pt-3">

                                                <div class="md-form d-grid text-center">
                                                <x-jet-button class="ml-4 btn btn-warning"> {{ __('Log in') }}  </x-jet-button>
                                                
                                                </div>

                                            </div>
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <!--Grid row-->
                                    </form>
                            
                    
                        </div>
                        <!--Grid column-->




                          <!--Grid column 2 -->
                          <div class="col-md-5  mb-md-0 mb-5 p-4 border">

                                        <h4 class="text-center">Create New Account</h4>
                                        <p class="text-center">Choose your Account Type</p>
                               <div>
                           
                               </div>         
                                


                                <div id="div1" class="target">

                                    <form id="contact_us_create" name="contact-form" method="POST" action="{{ route('register') }}" class="p-3">
                                            @csrf
                                            <!--Grid row-->

                                            <div class="row mb-3">

                                            <div class="row mb-3">

                                                        <div class="col-6">
                                                                <div class="md-form d-grid text-center">
                                                                <input type="radio"  name="role"  autocomplete="off" value="candidate">
                                                                    <label class="btn btn-warning" for="role">Candidate</label>
                                                                </div>
                                                        </div>
                                                        <div class="col-6">
                                                                <div class="md-form d-grid text-center">
                                                                <input type="radio"  name="role"  autocomplete="off" value="employer">
                                                                    <label class="btn btn-warning" for="role">Employer</label>
                                                                </div>
                                                        </div>

                                            </div>



                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <x-jet-input id="username"  class="form-control p-2" type="text" name="username" :value="old('username')" placeholder="Username*" required />
                                                        <span class="text-danger error-text username_error "></span>
                                                        
                                                    </div>
                                                </div>
                                                <!--Grid column-->
    
                                            </div>

                                            <div class="row mb-3">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <x-jet-input id="email"  placeholder="Email*" class="form-control p-2" type="email" name="email" :value="old('email')" required />
                                                        <span class="text-danger error-text email_error "></span>
                                                        
                                                    </div>
                                                </div>   
                                            </div>

                                            <div class="row mb-3">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        
                                                        <x-jet-input id="password" class="form-control p-2" type="password" name="password" placeholder="Password*" required autocomplete="new-password" />
                                                        <span class="text-danger error-text password_error "></span>
                                                        
                                                    </div>
                                                </div>   
                                            </div>

                                            <div class="row mb-3">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                        <x-jet-input id="password_confirmation" class="form-control p-2" type="password" name="password_confirmation" placeholder="Confirm Password*" required autocomplete="new-password" />
                                                        <span class="text-danger error-text confirm_password_error "></span>
                                                        
                                                    </div>
                                                </div>   
                                            </div>
                                          

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                          <x-jet-input id="phone"  class="form-control p-2" type="text" name="phone" :value="old('phone')" placeholder="phone*" required />
                                                        <span class="text-danger error-text phone_error "></span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                             <?php
                                                     $categories = DB::table('job_categories')->where('parent_id',null)->get();
                                                 ?>   

                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                <select class="form-select" name="job_category_id" aria-label="Default select example">
                                                    <option selected>Select Category</option>
                                                       @foreach ($categories as $catgory )

                                                       <option value="{{$catgory->id}}"> {{$catgory->title}}</option>
                                                         
                                                       @endforeach                                              
                                                </select>
                                                <span class="text-danger error-text job_category_id_error "></span>
                                                </div>
                                            </div>
                                            <!--Grid row-->                   
                                            <div class="row">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                                            <div class="mt-4">
                                                                <x-jet-label for="terms">
                                                                    <div class="flex items-center">
                                                                        <x-jet-checkbox name="terms" id="terms"/>

                                                                        <div class="ml-2">
                                                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                                                    'privacy_policy' => '<a target="_blank" href="" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                                            ]) !!}
                                                                        </div>
                                                                    </div>
                                                                </x-jet-label>
                                                            </div>
                                                        @endif
                                                </div>
            
                                            </div>
                                            <div class="row my-2">
    
                                                <!--Grid column-->
                                                <div class="col-md-12 pt-3">
    
                                                    <div class="md-form d-grid text-center">
    
                                                    <input type="submit" class="btn btn-dark  py-3" value="Register Now" >
                                                
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!--Grid row-->
                                        </form>
                                </div>


                               {{-- <div id="div2"  class="target">

                                    <form id="contact_us_create" name="contact-form" action="" method="POST" class="p-3">
                                            @csrf
                                            <!--Grid row-->
                                            <div class="row mb-3">
                                                <!--Grid column-->
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                    
                                                        <input type="text" id="email" name="email" class="form-control p-2">
                                                        <span class="text-danger error-text email_error "></span>
                                                        
                                                    </div>
                                                </div>
                                                <!--Grid column-->
    
                                            </div>
                                            <!--Grid row-->
                                            <!--Grid row-->
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="md-form mb-0">
                                                
                                                        <input type="text" id="subject" name="subject" class="form-control p-2">
                                                        <span class="text-danger error-text subject_error "></span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Grid row-->                   
                                            <div class="row">
                                                <!--Grid column-->
                                                <div class="col-md-12">
    
                                                    <div class="mb-1 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">You accept our Terms and Conditions and Privacy Policyn</label>
                                                    </div>
                                                </div>
            
                                            </div>
                                            <div class="row my-2">
    
                                                <!--Grid column-->
                                                <div class="col-md-12 pt-3">
    
                                                    <div class="md-form d-grid text-center">
    
                                                    <input type="submit" id="subject" name="subject" class="btn btn-outline-warning  py-3" value="Login" >
                                                
                                                    </div>
    
                                                </div>
                                            </div>
                                            <!--Grid row-->
                                        </form>
                                </div> --}}

                            
                    
                        </div>
                        <!--Grid column-->



                    </div>

    </section>


    </div>



  </div>




@endsection


{{-- @extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'register', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Register') }}</strong></h4>
            <div class="social-line">
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-facebook-square"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-twitter"></i>
              </a>
              <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                <i class="fa fa-google-plus"></i>
              </a>
            </div>
          </div>
          <div class="card-body ">
            <p class="card-description text-center">{{ __('Or Be Classical') }}</p>
            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                      <i class="material-icons">face</i>
                  </span>
                </div>
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required>
              </div>
              @if ($errors->has('name'))
                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                  <strong>{{ $errors->first('name') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
              </div>
              @if ($errors->has('email'))
                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('email') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password...') }}" required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password...') }}" required>
              </div>
              @if ($errors->has('password_confirmation'))
                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
              @endif
            </div>
            <div class="form-check mr-auto ml-3 mt-3">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                <span class="form-check-sign">
                  <span class="check"></span>
                </span>
                {{ __('I agree with the ') }} <a href="#">{{ __('Privacy Policy') }}</a>
              </label>
            </div>
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Create account') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection --}}
