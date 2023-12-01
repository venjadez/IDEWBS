@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Admin | Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-secondary btn-sm text-white float-end">
                            Add Products
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table  id="table" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    @if ($product->category)
                                        <td>{{ $product->category->name }}</td>
                                    @else
                                        No Category
                                    @endif
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/products/' . $product->id . '/edit')}}" class="btn btn-secondary  mdi mdi-square-edit-outline"> Edit</a>
                                        <a href="{{ url('admin/products/' . $product->id . '/delete')}}" onclick="return confirm('Are you sure you want to delete this {{$product->name}}?')" class="btn btn-danger mdi mdi-delete-outline"> Delete</a>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No Product Available</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
@endsection

