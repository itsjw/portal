<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <!--<img src="images/demo/shards-logo.svg" alt="Example Navbar 1" class="mr-2" height="30px">-->
    <a class="navbar-brand" href="/">phpmap.co</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-6" aria-controls="navbarNavDropdown-6" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown-6">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="/threads" id="navbarDropdownMenuLink-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Forums
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
                    @if (auth()->check())
                        <a class="dropdown-item" href="/threads?by={{ auth()->user()->username }}">My Threads</a>
                    @endif
                        <a class="dropdown-item" href="/threads?popular=1">Popular Threads</a>
                        <a class="dropdown-item" href="/threads?unanswered=1">Unanswered Threads</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Channels
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink-6">
                    @foreach ($channels as $channel)
                        <a class="dropdown-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @if (Auth::guest())
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @else
                    <user-notifications></user-notifications>

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>