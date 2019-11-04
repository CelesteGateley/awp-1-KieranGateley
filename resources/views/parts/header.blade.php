<nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom text-light">
    <div class="navbar-brand abs" href="#"><a class="text-light" href="/">Welcome to My Blog!</a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="collapsingNavbar">
        @if (Auth::check())
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
        @else
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>
            </li>
        </ul>
        @endif
    </div>
</nav>
