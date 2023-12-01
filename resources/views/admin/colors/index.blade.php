@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Add Colors
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table  id="table" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
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
                            <td><a href="{{url('admin/colors/'.$data->id.'/edit')}}" class="btn btn-secondary mdi mdi-square-edit-outline"> Edit</a>
                                <a href="{{url('admin/colors/'.$data->id.'/remove')}}" onclick="return confirm('Are you sure you want to delete Color {{$data->name}}?')" class="btn btn-danger mdi mdi-delete-outline"> Remove</a>
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
@push('script')

<script>
$(document).ready( function () {
    var table = $('#table').DataTable();
  } );

  $.extend( $.fn.dataTable.defaults, {
    responsive: true
  } );

      </script>
  @endpush
