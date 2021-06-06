<nav class="navbar-default navbar-static-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
      <li class="nav-header">
        <div class="dropdown profile-element">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
              <span class="block m-t-xs">
                <strong class="font-bold">Example user</strong>
              </span> <span class="text-muted text-xs block">Example menu <b class="caret"></b></span>
            </span>
          </a>
          <ul class="dropdown-menu animated fadeInRight m-t-xs">
            <li><a href="/logout">Logout</a></li>
          </ul>
        </div>
        <div class="logo-element">
          IN+
        </div>
      </li>
      <li class="{{ Ekko::isActiveRoute('admin') }}">
        <a href="{{ url('/admin') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
      </li>
      <li class="{{ Ekko::areActiveRoutes(['admin.car.*']) }}">
        <a href="{{ url('/admin/car') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Cars</span> </a>
      </li>
      <li class="{{ Ekko::areActiveRoutes(['admin.car_group.*']) }}">
        <a href="{{ url('/admin/car_group') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Car Groups</span> </a>
      </li>
      <li class="{{ Ekko::areActiveRoutes(['admin.category.*']) }}">
        <a href="{{ url('/admin/category') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Categories</span> </a>
      </li>
      <li class="{{ Ekko::areActiveRoutes(['admin.report.*']) }}">
        <a href="{{ url('/admin/report') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Тайлан</span> </a>
      </li>
    </ul>

  </div>
</nav>
