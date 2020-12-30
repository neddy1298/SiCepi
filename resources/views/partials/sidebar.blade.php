<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ config('app.name') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ route('dashboard.index') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a></li>


        <li class="menu-header">User Panel</li>
        <li class="{{ request()->is('dashboard/writing/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.writing.create') }}"><i class="fas fa-pencil-alt"></i>
                <span>Tulisan Baru</span></a></li>

        <li class="{{ request()->is('dashboard/my_writing') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.user_index') }}"><i class="fas fa-bookmark"></i>
                <span>Tulisan Saya</span></a></li>

        <li class="{{ request()->is('dashboard/settings/*') ? 'active' : '' }} nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i> <span>User Settings</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/settings/my_profile') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.user.profile') }}">My Profile</a></li>
                <li class="{{ request()->is('dashboard/settings/my_password') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.user.profile_password') }}">Ubah Password</a></li>
            </ul>
        </li>


        <li class="menu-header">Admin Panel</li>
        <li class="{{ request()->is('dashboard/user_*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard.user.index') }}"><i class="fas fa-users"></i>
                <span>List User</span></a></li>

        <li class="{{ request()->is('dashboard/admin/*') ? 'active' : '' }} nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i> <span>Management Tulisan</span></a>
            <ul class="dropdown-menu">
                <li class="{{ request()->is('dashboard/admin/new_template') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard.admin.template_create') }}">Buat
                        Template</a></li>
                <li class="{{ request()->is('dashboard/admin/list_template') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.admin.template') }}">List Template</a></li>

                <li class="{{ request()->is('dashboard/admin/list_user_writing') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.admin.user_writing') }}">List
                        Tulisan User</a></li>
                <li class="{{ request()->is('dashboard/admin/tag_*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('dashboard.admin.tag') }}">Tag Management</a></li>
            </ul>
        </li>
        <hr>
        <li>
            <a class="dropdown-item has-icon text-danger" href=" {{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">

                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>

    </ul>
</aside>
