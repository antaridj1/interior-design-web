<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">Semara Group</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{url('order-user')}}">Hubungi Kami</a></li>
          
          @guest
              <li><a class="nav-link" href="{{url('login')}}">Login</a></li>
          @endguest
          
          @auth
            <li class="dropdown"><a href="#"><span>Hi, {{auth()->user()->name}}</span><i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{route('project.index')}}">My Project</a></li>
                <li><a href="#">Edit Account</a></li>
                <li>
                  <a  href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                </li>
              </ul>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>