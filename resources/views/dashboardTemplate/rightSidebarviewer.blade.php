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
      <li class="nav-item nav-category">Category</li>
      <li class="nav-item">
        <a href="{{url('/viewer/view-list')}}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">All</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/viewer/view-bands')}}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Bands</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{url('/viewer/view-genres')}}" class="nav-link">
          <i class="link-icon" data-feather="calendar"></i>
          <span class="link-title">Genre</span>
        </a>
      </li>


    </nav>
