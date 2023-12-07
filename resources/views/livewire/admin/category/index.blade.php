<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyCategory">

                    <div class="modal-body">
                        <h6>Are you sure you want to delete this data?</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Admin | Category
                        <a href="{{ url('admin/category/create') }}"
                            class="btn btn-dark btn-sm float-end mdi mdi-plus-circle-outline">
                            Add Category
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="table" class="display table-hover table-bordered table-sm" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/category/' . $category->id . '/edit') }}"
                                            class="btn btn-secondary mdi mdi-square-edit-outline">Edit</a>
                                        <a href="#" wire:click="deleteCategory({{ $category->id }})"
                                            class="btn btn-danger mdi mdi-delete-outline" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Category Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    <div>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#deleteModal').modal('hide');
            });
        </script>
    @endpush
