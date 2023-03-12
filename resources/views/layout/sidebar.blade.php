<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Request::is('employee/home') || Request::is('employee/profile')? '' : 'collapsed'}}" href="{{route('employee.home')}}">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Route::is('employee.order.edit', 'employee.order.index', 'employee.order.show')? '' : 'collapsed'}}" href="{{route('employee.order.index')}}">
          <i class="bi bi-journal-text"></i>
          <span>Order</span>
        </a>
      </li>
      
      @if(role('admin'))
      <li class="nav-item">
        <a class="nav-link {{Route::is('employee.architect.*')? '' : 'collapsed'}}" href="{{route('employee.architect.index')}}">
          <i class="bi bi-people"></i>
          <span>Architect</span>
        </a>
      </li>

    <li class="nav-item">
        <a class="nav-link {{Route::is('employee.styleInterior.*', 'employee.typeInterior.*', 'employee.portfolio.*', 'employee.company.*')? '' : 'collapsed'}}"
            data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
            <i class="bi bi-menu-button-wide"></i><span>Landing Page</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{Route::is('employee.styleInterior.*', 'employee.typeInterior.*', 'employee.portfolio.*', 'employee.company.*')? 'show' : ''}}" data-bs-parent="#sidebar-nav" style="">
          <li class="nav-item">
            <a class="nav-link {{Route::is('employee.styleInterior.*')? '' : 'collapsed'}}" href="{{route('employee.styleInterior.index')}}">
              <i class="bi bi-circle"></i>
              <span>Style Interior</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Route::is('employee.typeInterior.*')? '' : 'collapsed'}}" href="{{route('employee.typeInterior.index')}}">
              <i class="bi bi-circle"></i>
              <span>Tipe Interior</span>
            </a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{Route::is('employee.portfolio.*')? '' : 'collapsed'}}" href="{{route('employee.portfolio.index')}}">
              <i class="bi bi-circle"></i>
              <span>Portfolio</span>
            </a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link {{Route::is('employee.company.*')? '' : 'collapsed'}}" href="{{route('employee.company.index')}}">
              <i class="bi bi-circle"></i>
              <span>Company</span>
            </a>
          </li>

        </ul>
      </li>

      @endif

    </ul>

  </aside><!-- End Sidebar-->