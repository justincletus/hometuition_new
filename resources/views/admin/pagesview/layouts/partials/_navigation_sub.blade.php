<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/about') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Schools</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Colleges</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Examination</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Admission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{url('/about')}}">Contact</a>
            </li>

          </ul>
        </div>
      </div>
      <div class="flex-center position-ref full-height" id="loginmenu">
          @if (Route::has('login'))
              <div class="top-right links">
                <ul class="navbar-nav">
                  @auth
                  <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>

                </ul>
                <ul class="navbar-nav">
                  @else
                  <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                  <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>

                  @endauth

                </ul>


              </div>
          @endif
    </nav>
