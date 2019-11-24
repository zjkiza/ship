<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notification.not.read') }}">Not read notification</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('notification.read')  }}">Read notification</a>
            </li>
        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>