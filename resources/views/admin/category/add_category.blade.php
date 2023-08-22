@extends('admin.admin')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<div class="card-body">
  <h4 class="card-title">Add Category Name</h4>
  <p class="card-description">
    Basic form layout
  </p>
  <form class="forms-sample" action="{{route('categories.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputUsername1">Category Name</label>
      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="name" name="category">
    </div>
    @error('category')
    {{$message}}
    @enderror
    <div class="form-group">
      <label for="exampleInputEmail1">Status</label>
      <select name="status" class="form-control" id="exampleSelectGender">
        <option value="1">active</option>
        <option value="0">inactive</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
  </form>
</div>
@endsection