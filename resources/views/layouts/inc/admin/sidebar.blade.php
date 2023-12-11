<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="menu-icon mdi mdi-sale"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-shape"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">View Category</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-apps-box">
                </i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="menu-icon mdi mdi-pen"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#colors" aria-expanded="false" aria-controls="ui-basic">
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
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#size" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-format-list-bulleted">
                </i>
                <span class="menu-title">Sizes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="size">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sizes/create') }}">Add Sizes</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/sizes') }}">View Sizes</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/user/create') }}"> Add User </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/users') }}"> View Users</a></li>

                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="menu-icon mdi mdi-view-carousel"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="menu-icon mdi mdi-settings"></i>
                <span class="menu-title">Site settings</span>
            </a>
        </li>
    </ul>
</nav>
