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
          <a class="nav-link {{Route::is('employee.order.create')? '' : 'collapsed'}}" href="{{route('employee.order.create')}}">
            <i class="bi bi-pencil"></i>
            <span>Create Order</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::is('employee.styleInterior.*')? '' : 'collapsed'}}" href="{{route('employee.styleInterior.index')}}">
            <i class="bi bi-people"></i>
            <span>Style Interior</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::is('employee.architect.*')? '' : 'collapsed'}}" href="{{route('employee.architect.index')}}">
            <i class="bi bi-people"></i>
            <span>Architect</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{Route::is('employee.portfolio.*')? '' : 'collapsed'}}" href="{{route('employee.portfolio.index')}}">
            <i class="bi bi-bank"></i>
            <span>Portfolio</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{Route::is('employee.typeInterior.*')? '' : 'collapsed'}}" href="{{route('employee.typeInterior.index')}}">
            <i class="bi bi-bank"></i>
            <span>Tipe Interior</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{Route::is('employee.company.*')? '' : 'collapsed'}}" href="{{route('employee.company.index')}}">
            <i class="bi bi-bank"></i>
            <span>Company</span>
          </a>
        </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->