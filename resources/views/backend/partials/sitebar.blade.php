<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('/backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="{{ url('/') }}" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview  {{ isActive(['admin/category/list', 'admin/sub-category/list', 'admin/child-category/list', 'admin/brand/list']) }}">
                    <a href="#"
                        class="nav-link {{ isActive(['admin/category/list', 'admin/sub-category/list', 'admin/child-category/list', 'admin/brand/list']) }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.category.list') }}"
                                class="nav-link {{ isActive('admin/category/list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sub.category.list') }}"
                                class="nav-link {{ isActive('admin/sub-category/list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.child.category.list') }}"
                                class="nav-link {{ isActive('admin/child-category/list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Child Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.list') }}"
                                class="nav-link {{ isActive('admin/brand/list') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li
                    class="nav-item has-treeview  {{ isActive(['admin/setting/seo', 'admin/setting/smtp', 'admin/page', 'admin/page/edit*']) }}">
                    <a href="#"
                        class="nav-link {{ isActive(['admin/setting/seo', 'admin/setting/smtp', 'admin/page', 'admin/page/edit*']) }}">
                        <i class="fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.seo') }}"
                                class="nav-link {{ isActive('admin/setting/seo') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SEO Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sub.category.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Website Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page.index') }}"
                                class="nav-link {{ isActive(['admin/page', 'admin/page/edit*']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Page Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.smtp') }}"
                                class="nav-link {{ isActive('admin/setting/smtp') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SMTP Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brand.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payment Gateway</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Calendar
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
