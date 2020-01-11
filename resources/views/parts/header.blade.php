<nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom text-light">
    <div class="navbar-brand abs" href="#"><a class="text-light" href="{{ route('home') }}">Welcome to My Blog!</a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="collapsingNavbar">
        <ul class="nav navbar-nav ml-auto">
            <form action="/search" method="POST" role="search" class="form-inline">
                {{ csrf_field() }}
                <li class="nav-item">
                    <input type="submit" style="visibility: hidden; width: 0" />
                    <input type="text" class="form-control form-control-sm" name="query" placeholder="Search Posts">
                </li>
            </form>
        @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('create_post') }}">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all_posts') }}">Manage Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all_users') }}">Manage Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        @endif
        </ul>
    </div>
</nav>
