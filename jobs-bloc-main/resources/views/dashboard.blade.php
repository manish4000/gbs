@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('admin.users.index',['role'=>'candidate'])}}">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons"></i>
              </div>
            
              <h4 class="card-title">Total Candidates </h4>
              <h5 class="card-title">{{$total_candidates}} </h5>
            </div>
            <div class="card-footer">
              <div class="stats">
              
                
              </div>
            </div>
          </div>
        </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('admin.users.index',['role'=>'employer'])}}">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <h4 class="card-title">Total Employer </h4>
              <h5 class="card-title">{{$total_employer}}</h5>
            </div>
            <div class="card-footer">
              <div class="stats">
  
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <a href="{{route('admin.job.submit_job.index')}}">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons"></i>
              </div>
              <h4 class="card-title">Total Jobs </h4>
              <h5 class="card-title">{{$total_jobs}} </h5>
            </div>
            <div class="card-footer">
              <div class="stats">
     
              </div>
            </div>
          </div>
          </a>
        </div>
        {{-- <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <h4 class="card-title">Total Jobs Applications </h4>
              <h5 class="card-title">Total Candidates </h5>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    
      
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush