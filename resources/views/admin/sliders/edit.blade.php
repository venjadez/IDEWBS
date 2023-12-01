@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Edit sliders
                <a href="{{url('admin/sliders/')}}" class="btn btn-secondary btn-sm text-white float-end">
                        Back
                </a>
            </h4>
    </div>
        <div class="card-body">
<form action="{{url('admin/sliders/'.$slider->id.'/update')}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
    <div class=" mb-3 ">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{$slider->title}}"/>
    </div>
    <div class=" mb-3 ">
        <label>Description</label>
        <textarea type="text" name="description" class="form-control" rows="3" >{{$slider->description}}</textarea>
    </div>
    <div class=" mb-3 ">
        <label>Image</label>
        <input type="file" name="image" multiple class="form-control" />
        <img src="{{ asset($slider->image) }}" style="width:80px;height:80px;"
        class="me-4 border" alt="Slider">
    </div>
    <div class=" mb-3 ">
        <label>Status</label><br/>
        <input type="checkbox" name="status" style="width: 50px;height: 50px;" {{$slider->status == '1' ? 'checked':''}}/> Checked = Hidden , Un-Checked = Visible
    </div>
    <div class="col-md-12 mb-3 ">
  <button type="submit" class="btn btn-primary ">Save</button>
    </div>


</form>

        </div>
    </div>
</div>
    @endsection
