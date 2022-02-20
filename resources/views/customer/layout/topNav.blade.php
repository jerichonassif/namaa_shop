<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">support@namaa-solutions.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">+90 507 944 77 46</a>
            </div>
            <div>
                @if (Route::has('login'))
                        @auth
                            @if(auth()->user()->isAdmin === 1)
                             <a href="{{ route('dashboard') }}" class="text-light mx-2">Dashboard</a>
                            @endif
                            <form class="d-inline" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="text-light mx-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">{{ __('Log Out') }}</a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-light mx-2">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-light mx-2">Register</a>
                            @endif
                        @endauth
                @endif
                <a class="text-light" href="https://www.facebook.com/namaa.solutions/?ref=br_rs" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/namaasolutions/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/namaa_solutions" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/company/namaa-solutions/mycompany/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
