@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Colors List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Add Colors
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $data)
                            <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->code}}</td>
                            <td>{{$data->status ? 'Hidden':'Visible'}}</td>
                            <td><a href="{{url('admin/colors/'.$data->id.'/edit')}}" class="btn btn-secondary">Edit</a>
                                <a href="{{url('admin/colors/'.$data->id.'/remove')}}" onclick="return confirm('Are you sure you want to delete Color {{$data->name}}?')" class="btn btn-danger">Remove</a>
                        </td>
                        @empty
                        <tr>
                            <td colspan="5">No Color Found</td>
                        </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
