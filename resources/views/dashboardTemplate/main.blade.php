@include('dashboardTemplate.header')


<div class="main-wrapper" id="app">
    <div class="page-wrapper">
  <!--Dashboard Sidebar-->

  @if(Auth::guard('viewer')->user())
  @include('dashboardTemplate.rightSidebarviewer')

  @else
  @include('dashboardTemplate.rightSidebar')

  @endif

@include('dashboardTemplate.topbar')

@yield('content')
</div>

</div>
@include('dashboardTemplate.footer')
