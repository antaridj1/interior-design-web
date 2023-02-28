<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{Request::is('employee/home') || Request::is('employee/profile')? '' : 'collapsed'}}" href="{{route('home')}}">
          <i class="bi bi-house-door"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{Route::is('order.edit', 'order.index', 'order.show')? '' : 'collapsed'}}" href="{{route('order.index')}}">
          <i class="bi bi-journal-text"></i>
          <span>Order</span>
        </a>
      </li>
      @if(role('architect'))
        <li class="nav-item">
          <a class="nav-link {{Route::is('order.create')? '' : 'collapsed'}}" href="{{route('order.create')}}">
            <i class="bi bi-pencil"></i>
            <span>Create Order</span>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link {{Route::is('styleInterior.edit', 'styleInterior.index', 'styleInterior.create')? '' : 'collapsed'}}" href="{{route('styleInterior.index')}}">
            <i class="bi bi-people"></i>
            <span>Style SInterior</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Route::is('architect.edit', 'architect.index', 'architect.create')? '' : 'collapsed'}}" href="{{route('architect.index')}}">
            <i class="bi bi-people"></i>
            <span>Architect</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{Route::is('landingPage.edit', 'landingPage.index', 'landingPage.create')? '' : 'collapsed'}}" href="{{route('landingPage.index')}}">
            <i class="bi bi-bank"></i>
            <span>Landing Page</span>
          </a>
        </li>
      @endif

    </ul>

  </aside><!-- End Sidebar-->