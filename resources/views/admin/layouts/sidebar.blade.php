<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @canany(['permission.show', 'roles.show', 'user.show'])
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="fa-solid fa-gears"></i>
                    <p>
                        Tuzilma
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview "  style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">

                    <li class="nav-item">
                        <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="fa-solid fa-key"></i>
                            <p>
                                Ruxsatlar
                            </p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href="{{ route('roles.index') }}" class="nav-link ">
                            <i class="fa-solid fa-users-gear"></i>
                            <p>
                                Rollar
                            </p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Bosh sahifa
                    </p>
                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link ">
                    <i class="fa fa-user"></i>
                    <p>
                        Foydalanuvchilar
                    </p>
                </a>
            </li>

        @endcanany
            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="fa fa-folder"></i>

                    <p>
                        Bildirishnoma <span class="badge badge-info right">( 2 )</span>
                    </p>
                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link ">
                    <i class="fa fa-list"></i>

                    <p>
                        Kategoriyalari
                    </p>
                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('faculty.index') }}" class="nav-link ">
                    <i class="fa fa-user"></i>
                    <p>
                        Fakultetlar
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link ">
                    <i class="fa fa-thumbtack"></i>
                    <p>
                        Topshiriq
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('sendtask.create') }}" class="nav-link active">
                            <i class="fa fa-paper-plane"></i>
                            <p>Yuborish</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sendtask.index') }}" class="nav-link ">
                            <i class="fa fa-file-import"></i>
                            <p>Yuborilganlar</p>
                        </a>
                    </li>

                </ul>
            </li>


    </ul>
</nav>
<!-- /.sidebar-menu -->
