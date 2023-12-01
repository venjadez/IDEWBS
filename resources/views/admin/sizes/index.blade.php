@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Sizes
                        <a href="{{ url('admin/sizes/create') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Add Size
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Size value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $data)
                                <tr>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->size_value }}</td>
                                    <td>{{ $data->status ? 'Hidden' : 'Visible' }}</td>
                                    <td><a href="{{ url('admin/sizes/' . $data->id . '/edit') }}"
                                            class="btn btn-secondary mdi mdi-square-edit-outline"> Edit</a>
                                        <a href="{{ url('admin/sizes/' . $data->id . '/remove') }}"
                                            onclick="return confirm('Are you sure you want to delete Size {{ $data->size_value }}?')"
                                            class="btn btn-danger mdi mdi-delete-outline"> Remove</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable();
        });

        $.extend($.fn.dataTable.defaults, {
            responsive: true
        });
    </script>
@endpush
