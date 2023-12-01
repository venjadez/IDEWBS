@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Add sliders
                <a href="{{url('admin/sliders')}}" class="btn btn-secondary btn-sm text-white float-end mdi mdi-keyboard-return">
                        Back
                </a>
            </h4>
    </div>
        <div class="card-body">
<form action="{{url('admin/sliders/store')}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
    <div class="col-md-6 mb-3 ">
        <label>Title</label>
        <input type="text" name="title" class="form-control" />
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" ></textarea>
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Image</label>
        <input type="file" name="image" multiple class="form-control" />
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Status</label><br/>
        <input type="checkbox" name="status" style="width: 50px;height: 50px;" /> Checked = Hidden , Un-Checked = Visible
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
