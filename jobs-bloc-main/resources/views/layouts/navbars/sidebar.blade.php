<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('Admin Panel') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }} ">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
       <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        {{-- <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a> --}}
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.profile.edit') }}">
                <span class="sidebar-mini"> AP </span>
                <span class="sidebar-normal">{{ __('Admin profile') }} </span>
              </a>
            </li>
            {{-- <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.user.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li> --}}
          </ul>
        </div>
      </li> 

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('User Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="user-management">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.users.index',['role' => 'candidate'] ) }}">
                <span class="sidebar-mini"> CAN </span>
                <span class="sidebar-normal">{{ __('Candidates') }} </span>
              </a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.users.index',['role' => 'employer']) }}">
                <span class="sidebar-mini"> EMP </span>
                <span class="sidebar-normal">{{ __('Employer') }} </span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Settings') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="setting">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.settings.testimonial.index') }}">
                <span class="sidebar-mini"> TM </span>
                <span class="sidebar-normal">{{ __('Testimonial') }} </span>
              </a>
            </li>
           
          </ul>
        </div>
      </li>


      {{-- <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.table') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Table List') }}</p>
        </a>
      </li> --}}

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">

        <a class="nav-link" data-toggle="collapse" href="#job" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Job') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse hide" id="job">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.job.applications.index') }}">
                <span class="sidebar-mini"> JA </span>
                <span class="sidebar-normal">{{ __('Job Applications') }} </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.job.job_category.index') }}">
                <span class="sidebar-mini"> JC </span>
                <span class="sidebar-normal">{{ __('Job Category') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.job.job_type.index') }}">
                <i class="material-icons">JT</i>
                  <p>{{ __('Job Type') }}</p>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('admin.job.submit_job.index') }}">
                <i class="material-icons">SJ</i>
                  <p>{{ __('Submit Job') }}</p>
              </a>
            </li>
           
          </ul>
        </div>

      </li>




      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.location.index') }}">
          <i class="material-icons">L</i>
            <p>{{ __('Location') }}</p>
        </a>
      </li>
     
      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.job.salary_type.index') }}">
          <i class="material-icons">ST</i>
            <p>{{ __('Salary Type') }}</p>
        </a>
      </li>



      {{-- <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.typography') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Typography') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.icons') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li> --}}
      {{-- <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link text-white bg-danger" href="{{ route('admin.upgrade') }}">
          <i class="material-icons text-white">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> --}}
    </ul>
  </div>
</div>
