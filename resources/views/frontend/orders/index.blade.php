@extends('layouts.app')
@section('title', 'Cart List')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Order ID</th>
                                    <th>Tracking No.</th>
                                    <th>Username</th>
                                    <th>Payment Mode</th>
                                    <th>Status Message</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->tracking_no }}</td>
                                            <td>{{ $data->fullname }}</td>
                                            <td>{{ $data->payment_mode }}</td>
                                            <td>{{ $data->created_at->format('d-m-y') }}</td>
                                            <td>{{ $data->status_message }}</td>
                                            <td><a href="{{ url('orders/' . $data->id) }}"
                                                    class="btn btn-secondary btn-sm">view</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Orders Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
