
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <title>Western Company</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <!-- plugin css -->
  <link href="/dashboard_asset/assets/fonts/feather-font/css/iconfont.css" rel="stylesheet" />
  <link href="/dashboard_asset/assets/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" />
  <link href="/dashboard_asset/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />
  <!-- end plugin css -->

  <link href="/dashboard_asset/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" />

  <!-- common css -->
  <link href="/dashboard_asset/css/app.css" rel="stylesheet" />
  <!-- end common css -->

  <link href="/dashboard_asset/assets/plugins/owl-carousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="/dashboard_asset/assets/plugins/owl-carousel/assets/owl.theme.default.min.css" rel="stylesheet" />
  <link href="/dashboard_asset/assets/plugins/animate-css/animate.min.css" rel="stylesheet" />

  <!-- common css -->
  <link href="/dashboard_asset/css/app.css" rel="stylesheet" />
  <link href="/dashboard_asset/css/switch-button.css" rel="stylesheet" />

  <!-- end common css -->

</head>
<script type="text/javascript">
$(document).ready(function(){
     $(".alert-success").delay(5000).slideUp(700);
     $(".alert-danger").delay(5000).slideUp(700);
});

</script>

<body>
  <script src="dashboard_asset/assets/js/spinner.js"></script>

  <div class="main-wrapper" id="app">
    <nav class="sidebar hidden-print">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          <img src="{{asset('img/logo.png')}}" alt="" width="130" height="90">
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item active">
            <a href="{{url('superadmin/home')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">web apps</li>
          <li class="nav-item ">
            <a href="{{url('superadmin/band-add')}}" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Register Band</span>
            </a>
          </li>


          <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#transac" role="button" aria-expanded="false" aria-controls="email">
              <i class="link-icon" data-feather="calendar"></i>
                      <span class="link-title">Action</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse " id="transac">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{url('superadmin/band-view')}}" class="nav-link ">VIew</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('superadmin/band-edit')}}" class="nav-link ">Edit</a>
                </li>
                <li class="nav-item">
                  <a href="{{url('superadmin/band-delete')}}" class="nav-link">Delete</a>
                </li>
              </ul>
            </div>
          </li>


        </nav>
        <div class="page-wrapper">
          <nav class="navbar hidden-print">
            <a href="#" class="sidebar-toggler">
              <i data-feather="menu"></i>
            </a>
            <div class="navbar-content  ">
              <form class="search-form">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i data-feather="search"></i>
                    </div>
                  </div>
                  <input type="text" class="form-control hidden-print" id="navbarForm" placeholder="Search here...">
                </div>
              </form>
              <ul class="navbar-nav">

                <li class="nav-item dropdown nav-apps">
                  <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid"></i>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="appsDropdown">

                  </div>
                </li>
                <li class="nav-item dropdown nav-profile">
                  <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="/dashboard_asset/assets/images/faces/face1.jpg" alt="profile">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                      <div class="figure mb-3">
                        <img src="/dashboard_asset/assets/images/faces/face1.jpg" alt="">
                      </div>
                      <div class="info text-center">
                        <p class="name font-weight-bold mb-0">{{Auth::guard('superadmin')->user()->name}}</p>
                        <p class="email text-muted mb-3">{{Auth::guard('superadmin')->user()->email}}</p>
                      </div>
                    </div>
                    <div class="dropdown-body">
                      <ul class="profile-nav p-0 pt-3">

                        <li class="nav-item">
                          <a
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();" class="nav-link">
                          <i data-feather="log-out"></i>
                          <span>Log Out</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <form id="logout-form"  action="{{ url('/superadmin/logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @yield('content')

        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
          <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="#" target="_blank">WESTERN CORPORATION</a>. All rights reserved</p>
          <p class="text-muted text-center text-md-left mb-0 d-none d-md-block"> <i class="mb-1 text-primary ml-1 icon-small"></i></p>
        </footer>    </div>
      </div>

      <!-- base js -->
      <script src="/dashboard_asset/js/app.js"></script>
      <script src="/dashboard_asset/assets/plugins/feather-icons/feather.min.js"></script>
      <script src="/dashboard_asset/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
      <!-- end base js -->

      <!-- plugin js -->
      <script src="/dashboard_asset/assets/plugins/chartjs/Chart.min.js"></script>
      <script src="/dashboard_asset/assets/plugins/jquery.flot/jquery.flot.js"></script>
      <script src="/dashboard_asset/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
      <script src="/dashboard_asset/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
      <script src="/dashboard_asset/assets/plugins/apexcharts/apexcharts.min.js"></script>
      <script src="/dashboard_asset/assets/plugins/progressbar-js/progressbar.min.js"></script>
      <!-- end plugin js -->

      <!-- common js -->
      <script src="/dashboard_asset/assets/js/template.js"></script>
      <!-- end common js -->

      <script src="/dashboard_asset/assets/js/dashboard.js"></script>
      <script src="/dashboard_asset/assets/js/datepicker.js"></script>
      <!-- plugin js -->
      <script src="/dashboard_asset/assets/plugins/owl-carousel/owl.carousel.min.js"></script>
      <script src="/dashboard_asset/assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
      <!-- end plugin js -->

      <script src="/dashboard_asset/assets/js/carousel.js"></script>

      <script type="text/javascript">

        $(document).ready(function(){

          $('#print').click(function(){
            window.print();
          });

          if (('.buy-now-wrapper').length) {
                   $('div').remove('.buy-now-wrapper');
          }

        });
      </script>

    </body>

    </html>
