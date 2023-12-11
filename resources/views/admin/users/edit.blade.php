@extends('layouts.admin')
@section('title', 'Edit User details')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Edit User details
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/users/' . $user->id . '/update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="text" name="email" readonly value="{{ $user->email }}"
                                    class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Password</label>
                                <input type="text" name="password" value="{{ $user->password }}" class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Select Role</label>
                                <select name="role_as" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection