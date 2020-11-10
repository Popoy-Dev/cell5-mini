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
      <li class="nav-item">
        <a href="{{url('/register')}}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Registration</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" data-toggle="collapse" href="#email" role="button" aria-expanded="false" aria-controls="email">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Register Actions</span>
          <i class="link-arrow" data-feather="chevron-down"></i>
        </a>
        <div class="collapse" id="email">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a href="{{url('/view')}}" class="nav-link ">View</a>
            </li>
            <li class="nav-item">
              <a href="{{url('/edit')}}" class="nav-link ">Edit</a>
            </li>
            <li class="nav-item">
              <a href="{{url('/delete')}}" class="nav-link">Delete</a>
            </li>
          </ul>
        </div>
      </li>

    </nav>
