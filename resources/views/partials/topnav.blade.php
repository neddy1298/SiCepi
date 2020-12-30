<form class="form-inline mr-auto" action="">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Welcome, {{ Auth::user()->name }}</div>
            <a href="{{ route('dashboard.user.profile') }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item has-icon text-danger" href=" {{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">

                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </li>
</ul>
