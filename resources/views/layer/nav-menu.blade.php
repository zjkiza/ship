<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Users list</a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.create')  }}">Add user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.notification')  }}">Notification</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Logout</button>
        </form>
    </div>
</nav>