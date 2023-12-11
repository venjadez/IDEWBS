@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h2 class="alert alert-success"> {{ session('message') }}, {{ Auth::user()->name }} </h2>
            @endif
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard,</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>Total Orders</label>
                        <h1>{{ $totalOrders }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>Today's Orders</label>
                        <h1>{{ $todayOrders }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>This Month Orders</label>
                        <h1>{{ $thisMonthOrders }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-dark text-white mb-3">
                        <label>This Year Orders</label>
                        <h1>{{ $thisYearOrders }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label>Total Products</label>
                        <h1>{{ $totalProducts }}</h1>
                        <a href="{{ url('admin/products') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label>Total Categories</label>
                        <h1>{{ $totalCategories }}</h1>
                        <a href="{{ url('admin/category') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-info text-white mb-3">
                        <label>Total Brands</label>
                        <h1>{{ $totalBrands }}</h1>
                        <a href="{{ url('admin/brands') }} " class="text-white">view</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3">
                        <label>All Users</label>
                        <h1>{{ $allUsers }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3">
                        <label>Total User</label>
                        <h1>{{ $totalUsers }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3">
                        <label>Total Admin</label></label>
                        <h1>{{ $totalAdmin }}</h1>
                        <a href="{{ url('admin/orders') }} " class="text-white">view</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
