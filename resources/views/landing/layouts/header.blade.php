<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="/" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('/QuickStart/assets/img/logo.png') }}" alt="">
        <h1 class="sitename">SEA Catering</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('mealplans') }}" class="{{  Route::is('mealplans') ? 'active' : '' }}">Meal Plans</a></li>
          <li><a href="{{ route('subscriptions') }}" class="{{ Route::is('subscriptions') ? 'active' : '' }}">Subscription</a></li>
          <li><a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'active' : '' }}">Contact Us</a></li>
          <li class="dropdown"><a href="#"><span>User (Guest)</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>


    </div>
  </header>