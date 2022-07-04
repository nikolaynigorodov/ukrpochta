<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route("logout") }}" class="nav-item nav-link px-3" style="font-size: medium">Log out</a>
                @else
                    <a href="{{ route('login') }}" class="nav-item nav-link px-3" style="font-size: medium">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-item nav-link mx-3" style="font-size: medium">Registration</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
