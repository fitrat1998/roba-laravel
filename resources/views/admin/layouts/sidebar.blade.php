<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav sidebar-toggle  nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
        role="menu"
        data-accordion="true">
        @canany(['permission.show', 'roles.show', 'user.show'])
            <li class="nav-item has-treeview ">
                <a href="#"
                   class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        Tuzilma
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"
                    style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">
                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}"
                               class="nav-link {{ Request::is('permission*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p>Ruxsatlar</p>
                            </a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                               class="nav-link {{ Request::is('role*') ? 'active' : '' }}">
                                <i class="fas fa-user-lock"></i>
                                <p>Rollar</p>
                            </a>
                        </li>
                    @endcan

                    @can('user.show')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                               class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                <i class="fas fa-user-friends"></i>
                                <p>Foydalanuvchilar</p>
                            </a>
                        </li>
                    @endcan
                </ul>

            </li>
        @endcanany

        <li class="nav-item">
            <a href="{{ route('objects.index') }}"
               class="nav-link {{ Request::is('objects*') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <p>Obyektlar</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('sections.index') }}"
               class="nav-link {{ Request::is('sections*') ? 'active' : '' }}">
                <i class="fa-solid fa-bath"></i>
                <p>Qo'shimcha qismlar</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('workers.index') }}"
               class="nav-link {{ Request::is('workers*') ? 'active' : '' }}">
                <i class="fa-solid fa-people-roof"></i>
                <p>Ishchilar</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('floorsections.index') }}"
               class="nav-link {{ Request::is('floorsections*') ? 'active' : '' }}">
                <i class="fa-solid fa-stairs"></i>
                <p>Qavat qismlari</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('flatsections.index') }}"
               class="nav-link {{ Request::is('flatsections*') ? 'active' : '' }}">
                <i class="fa-solid fa-house-chimney-window"></i>
                <p>Xona qismlari</p>
            </a>
        </li>
            <li class="nav-item">
                <a href="{{ route('objectsections.index') }}"
                   class="nav-link {{ Request::is('objectsections*') ? 'active' : '' }}">
                    <i class="fa-solid fa-square-parking"></i>
                    <p>Obyekt qismlari</p>
                </a>
            </li>


    </ul>
</nav>
<!-- /.sidebar-menu -->
