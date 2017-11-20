<nav class="flex items-center justify-between flex-wrap bg-grey-lighter p-6">
    <a class="flex items-center flex-no-shrink text-white mr-6" href="/">
        <img class="h-6 w-auto mr-2" src="https://raw.githubusercontent.com/PHPMap/phpmap/master/public/images/logo_big.png" alt="phpmap.co Logo">
    </a>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-grey border-grey hover:text-grey-darker hover:border-grey-darker">
            <svg class="h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a class="block mt-4 text-grey-dark hover:text-grey-darkest no-underline lg:inline-block lg:mr-4 lg:mt-0" href="{{ url('/') }}">
                Home
            </a>
            <div class="block mt-4 lg:inline-block lg:mr-4 lg:mt-0">
                <a class="text-grey-dark hover:text-grey-darkest no-underline" href="{{ url('/threads') }}">
                    Forums
                </a>
                <div class="block mt-4 ml-2 lg:hidden">
                    <div class="text-xs uppercase text-grey tracking-wide">
                        Channels
                    </div>
                    @foreach ($channels as $channel)
                        <a class="block mt-4 text-grey-dark hover:text-grey-darkest no-underline" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a>
                    @endforeach
                </div>
            </div>

            <a class="block mt-4 text-grey-dark hover:text-grey-darkest no-underline lg:inline-block lg:mr-4 lg:mt-0"
               href="{{ route('links.index') }}">
                Links
            </a>
        </div>
        <div class="text-sm">
            <div class="block mt-4 lg:inline-block lg:mr-4 lg:mt-0">
                <form action="/threads/search" method="post">
                    {!! csrf_field() !!}
                    <div class="field">
                        <div id="search-box" class="control">
                            <input class="block border border-grey-light p-2 w-full"
                                   name="q" type="text" placeholder="Search...">
                        </div>
                    </div>
                </form>
            </div>

            @if (Auth::guest())
                <a class="block mt-4 text-grey-dark no-underline hover:text-grey-darkest lg:inline-block lg:mr-4 lg:mt-0"
                   href="{{ route('login') }}">Login</a>
                <a class="block mt-4 text-grey-dark no-underline hover:text-grey-darkest lg:inline-block lg:mr-4 lg:mt-0"
                   href="{{ route('register') }}">Register</a>
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

