@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Add Category
                <a href="{{url('admin/category')}}" class="btn btn-secondary btn-sm text-white float-end">
                        Back
                </a>
            </h4>
    </div>
        <div class="card-body">
<form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
    <div class="col-md-6 mb-3 ">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required autofocus autocomplete="name"/>
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Slug</label>
        <input type="text" name="slug" class="form-control" required autocomplete="slug"/>
    </div>
    <div class="col-md-12 mb-3 ">
        <label>Description</label>
        <input type="text" name="description"   class="form-control"  required autocomplete="description"/>
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Image</label>
        <input type="file" name="image[]" class="form-control" autocomplete="image" />
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Status</label><br/>
        <input type="checkbox" name="status" autocomplete="status" />
    </div>
    <br/>
    <div class="col-md-12">
        <h4>SEO Tags</h4>
    </div>
    <div class="col-md-12 mb-3 ">
        <label>Meta Title</label>
        <input type="text" name="meta_title" class="form-control"  required autocomplete="meta_title"/>
    </div>
    <div class="col-md-12 mb-3 ">
        <label>Meta Keyword</label>
        <input type="text" name="meta_keyword"  class="form-control" required autocomplete="meta_keyword"/>
    </div>
    <div class="col-md-12 mb-3 ">
        <label>Meta Description</label>
        <input type="text" name="meta_description" class="form-control"  required autocomplete="meta_description" />
    </div>
    <div class="col-md-12 mb-3 ">
  <button type="submit" class="btn btn-primary float-end">Save</button>
    </div>

    </div>
</form>

        </div>
    </div>
</div>
    @endsection
