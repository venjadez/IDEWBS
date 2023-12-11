@extends('layouts.admin')
@section('title', 'User list')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Admin | User list
                        <a href="{{ url('admin/user/create') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Add User
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table table-bordered table-striped">
                        <table id="table" class="table table-bordered table-striped table-sm" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role_as == '0')
                                                <label class="badge btn-dark">user</label>
                                            @elseif ($user->role_as == '1')
                                                <label class="badge btn-dark">admin</label>
                                            @else
                                                <label class="badge btn-dark">none</label>
                                            @endif
                                        </td>
                                        <td><a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                                class="btn btn-secondary  mdi mdi-square-edit-outline btn-sm"> Edit</a>
                                            <a href="{{ url('admin/users/' . $user->id . '/remove') }}"
                                                onclick="return confirm('Are you sure you want to remove {{ $user->name }} from the user list?')"
                                                class="btn btn-danger mdi mdi-delete-outline btn-sm"> Remove</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
