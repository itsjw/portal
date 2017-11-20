<nav class="navbar is-white has-shadow">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="https://raw.githubusercontent.com/PHPMap/phpmap/master/public/images/logo_big.png" alt="phpmap.co Logo" width="112" height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="{{ url('/') }}">
                Home
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="{{ url('/threads') }}">
                    Forums
                </a>
                <div class="navbar-dropdown is-boxed">
                    <div class="navbar-item">
                        <small>Channels</small>
                    </div>
                    @foreach ($channels as $channel)
                        <a class="navbar-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="/documentation/overview/start/">
                    Docs
                </a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="/documentation/overview/start/">
                        Overview
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
                        Modifiers
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
                        Columns
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/layout/container/">
                        Layout
                    </a>
                    <a class="navbar-item" href="https://bulma.io/documentation/form/general/">
                        Form
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="https://bulma.io/documentation/elements/box/">
                        Elements
                    </a>
                    <a class="navbar-item is-active" href="https://bulma.io/documentation/components/breadcrumb/">
                        Components
                    </a>
                </div>
            </div>

            <a class="navbar-item" href="{{ route('links.index') }}">
                Links
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <form action="/threads/search" method="post">
                    {!! csrf_field() !!}
                    <div class="field">
                        <div id="search-box" class="control">
                            <input class="input" name="q" type="text" placeholder="Search...">
                        </div>
                    </div>
                </form>
            </div>

            @if (Auth::guest())
                <a class="navbar-item " href="{{ route('login') }}">Login</a>
                <a class="navbar-item " href="{{ route('register') }}">Register</a>
            @else
                <user-notifications></user-notifications>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item" href="{{ url('/@' . auth()->user()->username) }}">
                            My Profile
                        </a>

                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>

