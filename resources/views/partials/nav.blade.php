<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">{{ config('APP_NAME', 'Playground') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="nav-item"><a href="{{ url('users/all') }}" class="nav-link">All Users</a></li>
                <li class="nav-item"><a href="{{ url('author/all') }}" class="nav-link">Author</a></li>
                <li class="nav-item"><a href="{{ url('admin/all') }}" class="nav-link">Admin</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user() ? Auth::user()->username : 'Username' }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @guest
                            <a class="dropdown-item" href="{{ url('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ url('register') }}">Register</a>
                        @else
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout">
                                @csrf
                            </form>
                        @endguest
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>