@extends('layouts.app')
@section('title', 'My Order Details')
@section('content')
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">

                        <h4 class="text-primary">
                            <i class="mdi mdi-shopping text-dark"></i> My Order Details
                            <a href="{{ url('orders') }}" class="btn btn-secondary btn-sm float-end">Back</a>
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
                                    Order Status:<span class="text-uppercase"> {{ $order->status_message }}</span>
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
                                                        <span>Color: {{ $data->productColor->color->name }}</span>
                                                    @endif
                                                @endif

                                            </td>
                                            <td width="10%">{{ $data->price }}</td>
                                            <td width="10%">{{ $data->quantity }}</td>
                                            <td width="10%" class="fw-bold">&#8369;{{ $data->quantity * $data->price }}
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
            </div>
        </div>
    </div>
    </div>
@endsection
