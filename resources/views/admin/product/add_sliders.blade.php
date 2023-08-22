@extends('admin.admin')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<div class="card-body">
    <h4 class="card-title">Add Slider</h4>
    <p class="card-description">
        Basic form layout
    </p>
    <form class="forms-sample" action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputCity12">Image</label>
            <input type="file" class="form-control" name="image" id="exampleInputCity1" placeholder="Location">
        </div>
        <div class="form-group">
            <label for="exampleInputName2"> links</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="links">
        </div>
        <div class="form-group">
            <label for="exampleInputName2">title</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Status</label>
            <select name="status" class="form-control" id="exampleSelectGender">
                <option value="1">active</option>
                <option value="0">inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button class="btn btn-light">Cancel</button>
    </form>
    @endsection