<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="menu-icon mdi mdi-speedometer"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="menu-icon mdi mdi-sale"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category"
                aria-expanded="{{ Request::is('admin/category*') ? 'true' : 'false' }}">
                <i class="mdi mdi-shape menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show' : '' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}"
                            href="{{ route('create-category') }}">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/category') }}">
                            View Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/products*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products">

                <i class="menu-icon mdi mdi-apps-box">
                </i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item "> <a
                            class="nav-link {{ Request::is('admin/products/create') ? 'active' : '' }}"
                            href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/products') }}">View Product</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="menu-icon mdi mdi-pen"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#colors">
                <i class="menu-icon mdi mdi-palette">
                </i>
                <span class="menu-title">Colors</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="colors">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/colors/create') }}">Add Colors</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/colors') }}">View Colors</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/sizes') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#size"
                aria-expanded="{{ Request::is('admin/sizes') ? 'true' : 'false' }}">
                <i class="menu-icon mdi mdi-format-list-bulleted">
                </i>
                <span class="menu-title">Sizes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/sizes') ? 'show' : '' }}" id="size">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Request::is('admin/sizes/create') ? 'active' : '' }}"
                            href="{{ url('admin/sizes/create') }}">Add Sizes</a>
                    </li>
                    <li class="nav-item"> <a
                            class="nav-link {{ Request::is('admin/sizes') || Request::is('admin/sizes/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/sizes') }}">View Sizes</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#users"
                aria-expanded="{{ Request::is('admin/users') ? 'true' : 'false' }}">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users') ? 'show' : '' }}" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link  {{ Request::is('admin/user/create') ? 'active' : '' }}"
                            href="{{ url('admin/user/create') }}"> Add User </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/users') }}">
                            View Users
                        </a>
                    </li>

                </ul>
            </div>
        </li>
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="menu-icon mdi mdi-view-carousel"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="menu-icon mdi mdi-settings"></i>
                <span class="menu-title">Site settings</span>
            </a>
        </li>
    </ul>

</nav>
