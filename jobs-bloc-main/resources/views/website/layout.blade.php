<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   
      <!-- Font Awesome -->
     <script src="https://kit.fontawesome.com/fa6267ab13.js" crossorigin="anonymous"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  

    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    {{-- this is for crousel  --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/chosen.min.css">

    {{-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> --}}


    {{-- this is for crousel --}}
   
     
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="{{asset('css/virtual-select.min.css')}}" >

    <style>
      .section-title::after {
  position: absolute;
  content: "";
  width: 100%;
  height: 0;
  top: 50%;
  left: 0;
  border-top: 1px dashed #bec5cb;
  z-index: -1;
}

.badge {
  display: inline-block;
  padding: 0.25em 0.4em;
  font-size: 75%;
  font-weight: 700;
  line-height: 1;
  text-align: center;
  color: black;
  white-space: nowrap;
  vertical-align: baseline;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.custom-checkbox .custom-control-input:checked ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%23fff' d='M6.564.75l-3.59 3.612-1.538-1.55L0 4.26l2.974 2.99L8 2.193z'/%3e%3c/svg%3e");
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
  border-color: #FFD333;
  background-color: #FFD333;
}

.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::after {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3e%3cpath stroke='%23fff' d='M0 2h4'/%3e%3c/svg%3e");
}

.custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
  background-color: rgba(255, 211, 51, 0.5);
}

.custom-checkbox .custom-control-input:disabled:indeterminate ~ .custom-control-label::before {
  background-color: rgba(255, 211, 51, 0.5);
}
/*  */
nav {
  padding: 0 15px;
}
a {
  color: #000;
  text-decoration: none;
  font-size: 18px;
}
.menu,
.submenu {
  list-style-type: none;
}

.item {
  padding: 10px;
}
.item.button {
  padding: 9px 5px;
}
.item:not(.button) a:hover,
.item a:hover::after {
  color: #ccc;
}
/* Mobile menu */
.menu {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
}
.menu li a {
  display: block;
  padding: 15px 5px;
}
.menu li.subitem a {
  padding: 15px;
}
.toggle {
  order: 1;
  font-size: 20px;
}
.item.button {
  order: 2;
}
.item {
  order: 3;
  width: 100%;
  text-align: center;
  display: none;
}
.active .item {
  display: block;
}
.button.secondary {
  /* divider between buttons and menu links */
  border-bottom: 1px #444 solid;
}
/* Submenu up from mobile screens */
.submenu {
  display: none;
}
.submenu-active .submenu {
  display: block;
}
.has-submenu i {
  font-size: 12px;
}
.has-submenu > a::after {
  font-family: "Font Awesome 5 Free";
  font-size: 12px;
  line-height: 16px;
  font-weight: 900;
  content: "\f078";
  color: white;
  padding-left: 5px;
}
.subitem a {
  padding: 10px 15px;
}
.submenu-active {
  background-color: #111;
  border-radius: 3px;
}

/* Tablet menu */
@media all and (min-width: 700px) {
  .menu {
    justify-content: center;
  }
  .logo {
    flex: 1;
  }
  .item.button {
    width: auto;
    order: 1;
    display: block;
  }
  .toggle {
    flex: 1;
    text-align: right;
    order: 2;
  }
  /* Button up from tablet screen */
  .menu li.button a {
    padding: 10px 15px;
    margin: 5px 0;
  }
  .button a {
    background: #0080ff;
    border: 1px royalblue solid;
  }
  .button.secondary {
    border: 0;
  }
  .button.secondary a {
    background: transparent;
    border: 1px #0080ff solid;
  }
  .button a:hover {
    text-decoration: none;
  }
  .button:not(.secondary) a:hover {
    background: royalblue;
    border-color: darkblue;
  }
}
/* Desktop menu */
@media all and (min-width: 960px) {
  .menu {
    align-items: flex-start;
    flex-wrap: nowrap;
    background: none;
  }
  .logo {
    order: 0;
  }
  .item {
    order: 1;
    position: relative;
    display: block;
    width: auto;
  }
  .button {
    order: 2;
  }
  .submenu-active .submenu {
    display: block;
    position: absolute;
    left: 0;
    top: 68px;
    background: #111;
  }
  .toggle {
    display: none;
  }
  .submenu-active {
    border-radius: 0;
  }
}

    </style>
  </head>
  <body>

  <!--  
<div class="container-fluid p-2  shadow border border-3 border-warning bg-white">

  {{-- style="display: flex;justify-content:center;" --}}

  <div class="container bg-info">


      <nav class="navbar navbar-expand-lg navbar-dark " >
  
        
  
          <a class="navbar-brand d-block" href="/">
            <img src="images/logo.png" height="50" />
          </a>
  
          <button class="navbar-toggler text-dark " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
          </button>
         
      
          <div class=" collapse navbar-collapse  " id="navbarNavDropdown">
  
          
  
            <ul class="navbar-nav ">
              
              <li class="nav-item">
                <a class="nav-link text-dark " aria-current="page" href="{{route('home')}}">  Home  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark  " aria-current="page" href="{{route('candidates')}}">  Find Resume  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark " aria-current="page" href="{{route('jobs')}}">   Job Search </a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link text-dark fw-bold" aria-current="page" href="{{route('job_by_category')}}"> Jobs By Category  </a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link text-dark " aria-current="page" href="{{route('job_by_location')}}">   Jobs By Location </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark " aria-current="page" href="{{route('contact')}}">  Contact  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark " aria-current="page" href="{{route('career_with_jabsbloc')}}">   Career with jobsbloc </a>
              </li>
          
      
               @if(Route::has('login'))
                  @auth 
                      @if(Auth::user()->role == "candidate")
                      <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                          {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                        class="img-fluid rounded-circle me-3" width="50"> --}}
                        <i class="fa-solid fa-user-large"></i>
                        {{Auth::user()->name}} </a>
                          <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('candidate.dashboard')}}"><i class="fas fa-tachometer-alt fa-fw"></i>  Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.profile.index')}}"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.resume.index')}}"><i class="fas fa-file fa-fw"></i> My Resume</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.applied_jobs')}}"><i class="fas fa-star-o fa-fw"></i> Applied Jobs</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-tag fa-fw fa-fw"></i> Packages</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.shortlist_jobs')}}"><i class="fas fa-chart-bar fa-fw"></i> Shortlist Jobs</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-secret fa-fw"></i> Following Employers</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.alert_job')}}"><i class="fas fa-bell-o fa-fw"></i> Alerts Jobs</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-comments-o fa-fw"></i> Messages</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.change_password')}}"><i class="fas fa-unlock-alt fa-fw"></i> Change Password</a></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out fa-fw"></i> Logout</a></li>
                        <li><a class="dropdown-item" href="{{route('candidate.delete_profile')}}"><i class="fas fa-trash fa-fw"></i> Delete Profile</a></li>
                          
                          
                          </ul>
                      </li>
                      @elseif(Auth::user()->role == "employer")    
                      <li class="nav-item dropdown">
                        <a class="nav-link  dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                          {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                        class="img-fluid rounded-circle me-3" width="50"> --}}
                        <i class="fa-solid fa-user-large"></i>
                        {{Auth::user()->name}} </a>
  
                          <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('employer.dashboard')}}"><i class="fas fa-tachometer-alt fa-fw"></i>  Dashboard</a></li>
                          <li><a class="dropdown-item" href="{{route('employer.profile.index')}}"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                          <li><a class="dropdown-item" href="{{route('employer.submit_job.add')}}"><i class="fas fa-file fa-fw"></i> Submit Job</a></li>
                          <li><a class="dropdown-item" href="{{route('employer.my_jobs')}}"><i class="fas fa-file fa-fw"></i> My Jobs</a></li>
                          <li><a class="dropdown-item" href="{{route('employer.applicants.index')}}"><i class="fas fa-file fa-fw"></i> Applicants</a></li>
                          <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out fa-fw"></i> Logout</a></li>
                          </ul>
                          
                      </li>
                      @endif
                  @else
                  <li>
                  <a href="{{route('register')}}" class="btn btn-warning p-3 ms-4  fw-bold"> Login/Register </a>
                 </li>
      
                  @endif
                  
              @endif 
                
            </ul>
          </div>
        
        </nav>
   
  </div>

  </div> 
  

<div class="d-block d-lg-none text-center px-5 border border-warning  py-3 m-2">
  <a href="{{route('login_register')}}" class="btn btn-warning px-5 py-3  fw-bold"> Login/Register </a>
</div>

 -->


 <div class="container-fluid p-2  shadow border border-3 border-warning bg-white">
      <nav class="container">
        <ul class="menu">
          <li class="logo"><a href="/"> <img src="images/logo.png" height="40" /> </a></li>
          <li class="item"><a href="{{route('home')}}">Home</a></li>
          <li class="item"><a href="{{route('candidates')}}">Find Resume</a></li>
          {{-- <li class="item has-submenu">
            <a tabindex="0">Services</a>
            <ul class="submenu">
              <li class="subitem"><a href="#">Design</a></li>
              <li class="subitem"><a href="#">Development</a></li>
              <li class="subitem"><a href="#">SEO</a></li>
              <li class="subitem"><a href="#">Copywriting</a></li>
            </ul>
          </li>
          <li class="item has-submenu">
            <a tabindex="0">Plans</a>
            <ul class="submenu">
              <li class="subitem"><a href="#">Freelancer</a></li>
              <li class="subitem"><a href="#">Startup</a></li>
              <li class="subitem"><a href="#">Enterprise</a></li>
            </ul>
          </li> --}}
          <li class="item"><a href="{{route('jobs')}}"> Job Search </a></li>
          <li class="item"><a href="{{route('contact')}}">Contact</a></li>
          <li class="item"><a href="{{route('about_us')}}">About</a></li>
          <li class="item"><a href="{{route('career_with_jabsbloc')}}">Career with jobsbloc</a></li>
         
          @if(Route::has('login'))
          @auth 
              @if(Auth::user()->role == "candidate")
              <li class="item dropdown">
                <a class="nav-link  dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                  {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                class="img-fluid rounded-circle me-3" width="50"> --}}
                <i class="fa-solid fa-user-large"></i>
                {{Auth::user()->name}} </a>
                  <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('candidate.dashboard')}}"><i class="fas fa-tachometer-alt fa-fw"></i>  Dashboard</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.profile.index')}}"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.resume.index')}}"><i class="fas fa-file fa-fw"></i> My Resume</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.applied_jobs')}}"><i class="fas fa-star-o fa-fw"></i> Applied Jobs</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-tag fa-fw fa-fw"></i> Packages</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.shortlist_jobs')}}"><i class="fas fa-chart-bar fa-fw"></i> Shortlist Jobs</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-user-secret fa-fw"></i> Following Employers</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.alert_job')}}"><i class="fas fa-bell-o fa-fw"></i> Alerts Jobs</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-comments-o fa-fw"></i> Messages</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.change_password')}}"><i class="fas fa-unlock-alt fa-fw"></i> Change Password</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out fa-fw"></i> Logout</a></li>
                <li><a class="dropdown-item" href="{{route('candidate.delete_profile')}}"><i class="fas fa-trash fa-fw"></i> Delete Profile</a></li>
                  
                  
                  </ul>
              </li>
              @elseif(Auth::user()->role == "employer")    
              <li class="item dropdown">
                <a class="nav-link  dropdown-toggle text-dark" href="#" data-bs-toggle="dropdown">
                  {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-1.webp" alt="avatar"
                class="img-fluid rounded-circle me-3" width="50"> --}}
                <i class="fa-solid fa-user-large"></i>
                {{Auth::user()->name}} </a>

                  <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('employer.dashboard')}}"><i class="fas fa-tachometer-alt fa-fw"></i>  Dashboard</a></li>
                  <li><a class="dropdown-item" href="{{route('employer.profile.index')}}"><i class="fas fa-user fa-fw"></i> Profile</a></li>
                  <li><a class="dropdown-item" href="{{route('employer.submit_job.add')}}"><i class="fas fa-file fa-fw"></i> Submit Job</a></li>
                  <li><a class="dropdown-item" href="{{route('employer.my_jobs')}}"><i class="fas fa-file fa-fw"></i> My Jobs</a></li>
                  <li><a class="dropdown-item" href="{{route('employer.applicants.index')}}"><i class="fas fa-file fa-fw"></i> Applicants</a></li>
                  <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out fa-fw"></i> Logout</a></li>
                  </ul>
                  
              </li>
              @endif
          @else
          <li>
           <a href="{{route('register')}}" class="btn btn-warning p-3 ms-4  fw-bold"> Login/Register </a>
         </li>

          @endif
          
      @endif 
          <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
        </ul>
      </nav>
  </div>
<!--  -->
    @yield('content')



<!-- footer -->




<footer class="container">

  <div class="row">

        <div class="col-12 col-lg-3 mb-3">

            <img src="images/logo.png" alt=""  width="100%">

              <h5><a href="mailto:info@jobsbloc.com" class="text-decoration-none">info@jobsbloc.com</a></h5>

              <!-- Facebook -->
                <a href="https://www.facebook.com/jobsbloc.9/" class="btn btn-primary text-decoration-none text-reset border-0" style="background-color: #3b5998;" href="#!" role="button"  ><i class="fab fa-facebook-f text-white"></i></a>

                <!-- Twitter -->
                <a href="https://twitter.com/jobsbloc" class="btn btn-primary text-decoration-none text-reset border-0" style="background-color: #55acee;" href="#!" role="button" ><i class="fab fa-twitter text-white"></i></a>


                <!-- Instagram -->
                <a href="https://www.linkedin.com/company/yourjobsbloc/" class="btn btn-primary text-decoration-none text-reset border-0" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram text-white"></i></a>

                <!-- Linkedin -->
                <a href="https://www.instagram.com/jobsbloc/" class="btn btn-primary text-decoration-none text-reset border-0" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in text-white"></i></a>




        </div>

        <div class="col-12 col-lg-3 text-start mb-3">

            <h5 class="text-uppercase">Important Links</h5>
                
              <p><a href="{{route('home')}}" class="text-muted  text-decoration-none"> Home </a></p>
              <p><a href="{{route('candidates')}}" class="text-muted  text-decoration-none"> Find Resumes </a></p>
              <p><a href="{{route('jobs')}}" class="text-muted  text-decoration-none"> Job Search </a></p>
              <p><a href="{{route('contact')}}" class="text-muted  text-decoration-none"> Contact Us </a></p>
              <p><a href="{{route('about_us')}}" class="text-muted  text-decoration-none"> About Us </a></p>
              <p><a href="{{route('career_with_jabsbloc')}}" class="text-muted  text-decoration-none"> Career With Jobsbloc </a></p>
              <p><a href="{{route('terms_conditions')}}" class="text-muted  text-decoration-none"> TERMS & CONDITIONS </a></p>

          
        </div>
        <div class="col-12 col-lg-3 text-start mb-3">

            <h5 class="text-uppercase">JOBSBLOC</h5>

            
         
                   <p><a href="{{route('coaches')}}" class="text-muted  text-decoration-none"> coaches  </a></p>
                   <p><a href="{{route('privacy_policy')}}" class="text-muted  text-decoration-none"> Privacy Policy </a></p>
                   <p><a href="#" class="text-muted  text-decoration-none"> Stuck in Personal or Professional life? </a></p>
                  
                
          
        </div>
       
        <div class="col-12 col-lg-3 mb-3">
           <h5>SEARCH JOB </h5>   

           <form class="row my-4" action="{{route('jobs')}}" method="GET">
                    <div class="col-12 mb-3 ">                       
                        <input type="text"  name="title" class="form-control border-warning py-2 px-3" id="staticEmail2" placeholder="Job Title or Keyword">
                    </div>
                             <div class=" d-grid  col-lg-2 text-center mb-3">
                        <button type="submit" class="btn btn-warning rounded-pill py-lg-2  btn-large  btn-block  text-white fw-bold px-lg-4"> Search</button>
                    </div>
           
              </form>  
           
        </div>
  </div>


</footer>


    <!-- Option 1: Bootstrap Bundle with Popper -->
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- this is for crousel  --}}
 
  
{{-- 
	<script src="assets/js/chosen.jquery.min.js"></script> --}}
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/functions.js"></script>

  {{-- this is for crousel --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(){
// make it as accordion for smaller screens
if (window.innerWidth > 992) {

	document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){

		everyitem.addEventListener('mouseover', function(e){

			let el_link = this.querySelector('a[data-bs-toggle]');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.add('show');
				nextEl.classList.add('show');
			}

		});
		everyitem.addEventListener('mouseleave', function(e){
			let el_link = this.querySelector('a[data-bs-toggle]');

			if(el_link != null){
				let nextEl = el_link.nextElementSibling;
				el_link.classList.remove('show');
				nextEl.classList.remove('show');
			}

		})
	});

}
// end if innerWidth
});



</script>   

<script>
  const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");
const items = document.querySelectorAll(".item");

/* Toggle mobile menu */
function toggleMenu() {
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
  } else {
    menu.classList.add("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
  }
}

/* Activate Submenu */
function toggleItem() {
  if (this.classList.contains("submenu-active")) {
    this.classList.remove("submenu-active");
  } else if (menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
    this.classList.add("submenu-active");
  } else {
    this.classList.add("submenu-active");
  }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  if (menu.querySelector(".submenu-active")) {
    let isClickInside = menu
      .querySelector(".submenu-active")
      .contains(e.target);

    if (!isClickInside && menu.querySelector(".submenu-active")) {
      menu.querySelector(".submenu-active").classList.remove("submenu-active");
    }
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".submenu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);

</script>
  </body>
</html>