<header class="header d-flex align-items-center fixed-top" id="header">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a class="logo d-flex align-items-center me-auto" href="/">
            <img src="{{ asset('/QuickStart/assets/img/logo.png') }}" alt="">
            <h1 class="sitename">SEA Catering</h1>
        </a>

        <nav class="navmenu mb-5" id="navmenu">
            <ul>
                <li><a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li><a class="{{ Route::is('mealplans.index') ? 'active' : '' }}" href="{{ route('mealplans.index') }}">Meal
                        Plans</a></li>
                <li><a class="{{ Route::is('subscriptions') ? 'active' : '' }}"
                        href="{{ route('subscriptions') }}">Subscription</a></li>
                <li><a class="{{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                </li>
                @guest
                    <li class="dropdown"><a href="#"><span>User (Guest)</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </li>

                @endguest

                @auth
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <li>
                                    <button class="nav-link" style="margin-left: 20px;" type="submit">Logout</button>
                                </li>
                            </form>
                        </ul>
                    </li>

                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
