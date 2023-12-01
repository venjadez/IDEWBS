@extends('layouts.admin')
@section('content')
<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div>
                <div class="card">
                    <div class="card-header">
                        <h4>
                           Admin | Brands
                            <a href="#" class="btn btn-dark btn-sm float-end mdi mdi-plus-circle-outline " data-bs-toggle="modal"
                                data-bs-target="#addBrandModal"> Add Brands</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table  id="table" class="display table-hover table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        @if ($brand->category)
                                        <td>{{ $brand->category->name }}</td>
                                        @else
                                        No Category
                                        @endif
                                        <td>{{ $brand->slug }}</td>
                                        <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                        <td>
                                            <a href="#" wire:click="editBrand({{ $brand->id }})"
                                                class="btn btn-secondary btn-sm mdi mdi-square-edit-outline" data-bs-toggle="modal"
                                                data-bs-target="#updateBrandModal"> Edit</a>

                                            <a href="#"wire:click="deleteBrand({{ $brand->id }})"
                                                class="btn btn-danger btn-sm mdi mdi-delete-outline" data-bs-toggle="modal"
                                                data-bs-target="#deleteBrandModal"> Remove</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No Brand Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addBrandModal').modal('hide');
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
        })
        $(document).ready( function () {
  var table = $('#table').DataTable();
});

$.extend( $.fn.dataTable.defaults, {
  responsive: true
} );

    </script>
@endpush
@endsection
