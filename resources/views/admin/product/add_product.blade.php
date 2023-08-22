@extends('admin.admin')
@section('content')
@if(session()->has('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">{{session('error')}}</div>
@endif
<div class="card-body">
    <h4 class="card-title">Add Product</h4>
    <p class="card-description">
        Basic form layout
    </p>
    <form class="forms-sample" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputName1"> Category Name</label>
            <select name="category" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->title}}</option>
                @endforeach
            </select>
            @error('category')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName1"> sub_category Name</label>
            <select name="subcategory" class="form-control">
                <option value="">Select Category</option>
                @foreach($subcategories as $catgory)
                <option value="{{$catgory->id}}">{{$catgory->title}}</option>
                @endforeach
            </select>
            @error('subcategory')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputName2"> Title</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="title">
        </div>
        <div class="form-group">
            <label for="exampleInputCity12">Image</label>
            <input type="file" class="form-control" name="image" id="exampleInputCity1" placeholder="Location">
        </div>
        <div class="form-group">
            <label for="exampleInputName2"> Slug</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="slug">
        </div>
        <div class="form-group">
            <label for="exampleInputName2">Price</label>
            <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="price">
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