@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product info.
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary btn-sm text-white float-end mdi mdi-arrow-left">
                            Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif
                    <livewire:admin.product.create :categories="$categories" :brands="$brands" />

            </div>
            </div>
        </div>
    </div>
@endsection
