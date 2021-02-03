<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ config('app.name') }}</a>
    </div>

    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        @if (Auth::user()->is_admin == 1)
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('dashboard.index') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>

        @endif
        <li class="menu-header">User Panel</li>


        <li class="{{ request()->is('dashboard/writing') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.writing.index') }}"><i class="fas fa-bookmark"></i>
                <span>Kutipan Saya</span></a></li>


        <li class="{{ request()->is('dashboard/writing/new') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.writing.create') }}"><i class="fas fa-pencil-alt"></i>
                <span>Buat Kutipan</span></a>
        </li>

        <li class="{{ request()->is('dashboard/settings/*') ? 'active' : '' }} nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i> <span>User Settings</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/settings/my_profile') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.user.profile') }}">My Profile</a></li>
                <li class="{{ request()->is('dashboard/settings/my_password') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.user.profile_password') }}">Ubah Password</a></li>
            </ul>
        </li>




        @if (Auth::user()->is_admin == 1)

        <li class="menu-header">Admin Panel</li>

        <li class="{{ request()->is('dashboard/admin/*') ? 'active' : '' }} nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Master Data</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/admin/category') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.admin.index_category') }}">Kategori</a>
                </li>
                <li class="{{ request()->is('dashboard/admin/author') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.admin.index_author') }}">Author</a>
                </li>
                <li class="{{ request()->is('dashboard/admin/topic') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.admin.index_topic') }}">Topik</a>
                </li>
            </ul>
        </li>

        <li class="{{ request()->is('dashboard/pricing') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.pricing') }}">
                <i class="fas fa-dollar-sign"></i> <span>Buat Promo Code</span></a>
        </li>

        <li class="{{ request()->is('dashboard/pricing/user') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('dashboard.pricing_user') }}"><i class="fas fa-undo"></i> Histori Pembelian</a>
        </li>

        <li class="{{ request()->is('dashboard/user_*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.user.index') }}"><i class="fas fa-users"></i>
                <span>List User</span></a></li>
        @endif
        <hr>
        <div class="mt-4 p-3 hide-sidebar-mini">
            <a href="{{ route('index') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-home"></i>Home</a>
            </a>
        </div>
        <div class="p-3 hide-sidebar-mini">
            <a class="btn btn-danger btn-lg btn-block btn-icon-split" href=" {{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">

                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>

    </ul>
</aside>
