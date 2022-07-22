<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav>
    <div class="position-sticky ">
      <div class="list-group list-group-flush mx-3 mt-4">

      <a
           href="#"
           class="list-group-item list-group-item-action shadow mb-2 py-3 fw-bold text-center"
           aria-current="true"
           >
          <span> Your name</span>
        </a>

        <a
           href="#"
           class="list-group-item list-group-item-action  py-2 ripple"
           aria-current="true"
           >
          <i class="fas fa-tachometer-alt fa-fw me-3 my-3"></i
            ><span>dashboard</span>
        </a>
        
        <a
           href="{{route('candidate.profile.index')}}"
           class="list-group-item list-group-item-action  py-2  active"
           >
          <i class="fas fa-user fa-fw me-3 my-3"></i
            ><span>Profile</span>
        </a>
        <a
           href="{{route('candidate.resume.index')}}"
           class="list-group-item list-group-item-action  py-2 ripple"
           ><i class="fas fa-file fa-fw me-3 my-3"></i><span>My Resume</span></a
          >
        <a
           href="{{route('candidate.applied_jobs')}}"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           ><i class="fas fa-star-o fa-fw me-3 my-3"></i
          ><span>Applied Jobs</span> </a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           >
          <i class="fas fa-tag fa-fw me-3 my-3"></i><span>Packages</span>
        </a>
        <a
           href="{{route('candidate.shortlist_jobs')}}"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           ><i class="fas fa-chart-bar fa-fw me-3 my-3"></i><span>Shortlist Jobs</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           ><i class="fas fa-user-secret fa-fw me-3 my-3"></i
          ><span>Following Employers</span></a
          >
        <a
           href="{{route('candidate.alert_job')}}"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           ><i class="fas fa-bell-o fa-fw me-3 my-3"></i
          ><span>Alerts Jobs</span></a
          >
        <a
           href="#"
           class="list-group-item list-group-item-action  py-2 ripple disabled"
           ><i class="fas fa-comments-o fa-fw me-3 my-3"></i
          ><span>Messages</span></a
          >
        <a
           href="{{route('candidate.change_password')}}"
           class="list-group-item list-group-item-action  py-2 ripple"
           ><i class="fas fa-unlock-alt fa-fw me-3 my-3"></i><span>Change Password</span></a
          >
        <a href="{{route('logout')}}"  class="list-group-item list-group-item-action py-2 ripp le">
          <i class="fas fa-sign-out fa-fw me-3 my-3"></i><span>Logout</span>
        </a>
    
        <a href="{{route('candidate.delete_profile')}}"  class="list-group-item list-group-item-action py-2 ripp le disabled">
          <i class="fas fa-trash fa-fw me-3 my-3"></i><span>Delete Profile</span>
        </a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <!-- <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white" >
  
    <div class="container-fluid">
    
      <button
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#sidebar"
              aria-controls="sidebar"
              aria-expanded="false"
              aria-label="Toggle navigation" >
        <i class="fas fa-bars"></i>

      </button>

    </div>
 
  </nav> -->
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<!-- <main style="margin-top: 58px">
  <div class="container pt-4">

  </div>
</main> -->

<!-- 
<script>
  // Graph
var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: [
      "Sunday",
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
    ],
    datasets: [
      {
        data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
        lineTension: 0,
        backgroundColor: "transparent",
        borderColor: "#007bff",
        borderWidth: 4,
        pointBackgroundColor: "#007bff",
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: false,
          },
        },
      ],
    },
    legend: {
      display: false,
    },
  },
});
</script> -->
<!--Main layout-->