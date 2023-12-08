@extends('layouts.app')
@section('title', 'Cart List')
@section('content')
    <div>
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
