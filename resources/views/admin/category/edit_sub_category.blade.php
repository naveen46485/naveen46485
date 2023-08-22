@extends('admin.admin')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<div class="card-body">
  <h4 class="card-title">Add Sub Category Name</h4>
  <p class="card-description">
    Basic form layout
  </p>
<form class="forms-sample" action="{{route('subcategories.update',$subcategories->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  {{method_field('PUT')}}
  <div class="form-group">
    <label for="exampleInputName1"> Category Name</label>
      <select name="category" class="form-control">
        <option value="{{$subcategories->category_id}}">Select Category</option>
        @foreach($categories as $cat)
        <option value="{{$cat->id}}" {{($subcategories->category_id==$cat->id) ? 'selected' : ''}}>{{$cat->title}}</option>
        @endforeach
      </select>
      @error('category')
      {{$message}}
      @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputName2"> title</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="sub_category" value="{{$subcategories->title}}">
  </div>
  <div class="form-group">
            <label for="exampleInputEmail4">Description</label>
            <textarea class="form-control" id="exampleInputEmail4" placeholder="Description" name="desc">{{$subcategories->discreption}}</textarea>
        </div>
  <div class="form-group">
  <img src="{{asset('images/'. $subcategories->Image)}}" width="100" height="100">
            <label for="exampleInputCity12">Image</label>
            <input type="file" class="form-control" name="image" id="exampleInputCity1" placeholder="Location">
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