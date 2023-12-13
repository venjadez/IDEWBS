@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Orders | Order Details
                    </h4>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">
                        <i class="mdi mdi-shopping text-dark"></i>My Orders
                        <a href="{{ url('admin/orders') }}" class="btn btn-dark btn-sm float-end mx-1">Back</a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/generate') }}"
                            class="btn btn-secondary btn-sm float-end mx-1">
                            <span class="mdi mdi-download"></span> Download Invoice</a>
                        <a href="{{ url('admin/invoice/' . $order->id) }}" class="btn btn-secondary btn-sm float-end mx-1"
                            target="_blank">
                            <span class="mdi mdi-eye"></span> View Invoice
                        </a>
                        <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}"
                            class="btn btn-secondary btn-sm float-end mx-1" target="_blank">
                            <span class="mdi mdi-mail"></span> Send Invoice Via Mail
                        </a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No.: {{ $order->tracking_no }}</h6>
                            <h6>Order Created Date: {{ $order->created_at->format('d-m-y h:i A') }}</h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status:<span class="text-uppercase">
                                    {{ $order->status_message }}</span>
                            </h6>
                            <h6></h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email Id: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pindcode: {{ $order->pincode }}</h6>
                        </div>
                    </div>
                    <br />
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $data)
                                    <tr>
                                        <td width="10%">{{ $data->id }}</td>
                                        <td width="10%">
                                            @if ($data->product->productImages)
                                                <img src="{{ asset($data->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="{{ $data->product->name }}">
                                            @else
                                                <img src="" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $data->product->name }}
                                            @if ($data->productColor)
                                                @if ($data->productColor->color)
                                                    <span>Color:
                                                        {{ $data->productColor->color->name }}</span>
                                                @endif
                                            @endif

                                        </td>
                                        <td width="10%">{{ $data->price }}</td>
                                        <td width="10%">{{ $data->quantity }}</td>
                                        <td width="10%" class="fw-bold">
                                            &#8369;{{ $data->quantity * $data->price }}
                                        </td>
                                        @php
                                            $totalPrice += $data->quantity * $data->price;
                                        @endphp

                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold">Total Amount:</td>
                                    <td colspan="1" class="fw-bold">&#8369;{{ $totalPrice }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Update your order status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option
                                            value="in progress"{{ Request::get('status') == 'in progress' ? 'selected' : '' }}>
                                            In progress</option>
                                        <option
                                            value="completed"{{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            Completed</option>
                                        <option value="pending"{{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                        <option
                                            value="cancelled"{{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                        <option
                                            value="out-for-delivery"{{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                            Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-dark"> Update</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-7">
                            <br />
                            <h4 class="mt-3">Current Order Status:<span class="text-uppercase">
                                    {{ $order->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
