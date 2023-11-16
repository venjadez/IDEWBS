@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Edit Colors
                <a href="{{url('admin/colors')}}" class="btn btn-secondary btn-sm text-white float-end">
                        Back
                </a>
            </h4>
    </div>
        <div class="card-body">
<form action="{{url('admin/colors/'.$data->id.'/update')}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class="row">
    <div class="col-md-6 mb-3 ">
        <label>Color Name</label>
        <input type="text" name="name" class="form-control" value="{{$data->name}}" />
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Color Code</label>
        <input type="text" name="code" class="form-control" value="{{$data->code}}" />
    </div>
    <div class="col-md-6 mb-3 ">
        <label>Status</label><br/>
        <input type="checkbox" name="status" style="width: 50px;height: 50px;"{{$data->status == '1' ? 'Checked':''}}/> Checked = Hidden , Un-Checked = Visible
    </div>
    <div class="col-md-12 mb-3 ">
  <button type="submit" class="btn btn-primary float-end">Update</button>
    </div>

    </div>
</form>

        </div>
    </div>
</div>
    @endsection
