<!-- top navigation  -->
<header>
  <div class="container-fluid">
    <div class="nav navbar-nav" style="display:block;">
      <div class="col-xs-12 col-sm-3 col-md-4">
        <a href="/">{{ config('app.name') }}</a>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-5 pull-right">

      <ul class="list-inline" style="margin-top:-25px;">
        <li class="list-inline-item"><p><i class="fa fa-map-marker-alt"></i></p></li>
        <li class="list-inline-item"><p><i class="fa fa-envelope"></i> info@hometuitionbangalore.online</p></li>
        <li class="list-inline-item"><p><i class="fa fa-phone-square"></i> +91-8779055740</p></li>

      </ul>
      </div>
    </div>

  </div>
</header>

<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="navbar-brand">
          <a class="navbar-brand" rel="home" href="{{ url('/') }}" title="Online Tutor Mumbai">
          <img style="max-width:100px; margin-top: -7px;"
               src="{{ asset('logo.png')}}">
          </a>

        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item" id="#about">
              <a class="nav-link js-scroll-trigger" href="#">About Us</a>

            </li>

            <li class="nav-item" id="#services">
              <a class="nav-link js-scroll-trigger" href="{{ url('/services')}}">Services</a>
            </li>
            <li class="nav-item" id="#portfolio">
              <a class="nav-link js-scroll-trigger" href="{{ url('/schools')}}">Schools</a>
            </li>
            <li class="nav-item" id="#colleges">
              <a class="nav-link js-scroll-trigger" href="{{ url('/colleges')}}">Colleges</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/examination')}}">Examination</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/courses')}}">Courses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/admissions')}}">Admission</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('/library')}}">Online-Lib</a>
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
                  <li class="nav-item"> <a href="{{ route('login') }}" class="nav-link">Login</a></li>
                  <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>

                  @endauth

                </ul>

              </div>
          @endif
    </nav>
