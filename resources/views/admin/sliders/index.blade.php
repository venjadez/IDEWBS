@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Sliders
                        <a href="{{url('admin/sliders/create')}}" class="btn btn-secondary btn-sm text-white float-end mdi mdi-plus">
                            Add Slider
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table  id="table" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $data)
                            <tr >
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->description}}</td>
                                <td>
                                    <img src="{{ asset($data->image) }}" style="width:80px;height:80px;"
                                    class="me-4 border" alt="Slider">
                                </td>
                                <td>{{$data->status == '0' ? 'Visible':'Hidden'}}</td>
                                <td>
                                    <a class="btn btn-secondary btn-sm text-white mdi mdi-square-edit-outline"
                                     href="{{url('admin/sliders/'.$data->id.'/edit')}}"> edit</a>
                                    <a class="btn btn-danger btn-sm text-white mdi mdi-delete-outline"
                                    href="{{url('admin/sliders/'.$data->id.'/destroy')}}" onclick="return confirm('Are you sure you want to remove this data ?')"> remove</a>
                                </td></tr>
                            @empty
                            <h1 class="text-center text-secondary my-5">No record in the database!</h1>
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

