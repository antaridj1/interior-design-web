<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        {{-- <h1 class="logo"><a href="{{url('/')}}"><img src="{{ asset('storage/'.$company->image) }}" width="200px" alt=""></a></h1> --}}
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo"><img src="{{ asset('storage/'.$company->logo) }}" alt="logo" class="img-fluid"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{Request::is('/')? 'active' : ''}}" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto {{Route::is('orderUser.create')? 'active' : ''}}" href="{{route('orderUser.create')}}">Order</a></li>
                
                @guest
                    <li><a class="nav-link {{Request::is('login')? 'active' : ''}}" href="{{url('login')}}">Login</a></li>
                    <li><a class="nav-link {{Request::is('register')? 'active' : ''}}" href="{{url('register')}}">Registrasi</a></li>
                @endguest
                
                
                @auth
                    <li class="dropdown {{Request::is('order-user')? 'active' : ''}}"><a href="#"><span>Hi, {{auth()->user()->name}}</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('orderUser.index')}}">My Project</a></li>
                            <li><a href="{{route('profile.editUser')}}">Edit Account</a></li>
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


