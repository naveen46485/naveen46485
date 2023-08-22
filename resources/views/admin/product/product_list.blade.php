@extends('admin.admin')
@section('content')
<div class="card-body">
  <h4 class="card-title">Product List</h4>
  <p class="card-description">
  </p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category</th>
        <th>Subcategory</th>
        <th> Title </th>
        <th>Image</th>
        <th>Slug</th>
        <th>Price</th>
        <th> Status </th>
        <th> Created_At</th>
        <th> Operation</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr class="table-info">
        <td>{{$product['id']}}</td>
        <td>{{$product->category->title}}</td>
        <td>{{$product->subcategory->title}}</td>
        <td>{{$product['title']}} </td>
        <td> <img src="{{asset('images/'. $product->Image)}}" width="100" height="100"></td>
        <td>{{$product['slug']}} </td> 
        <td>{{$product['price']}} </td>
        <td> {{$product['status']}} </td>
        <td> {{date('d-m-y',strtotime($product['created_at']))}} </td>
        <td><a href="{{route('products.edit',$product['id'])}}" class="btn btn-success">edit</a>
          <a href="{{route('products.destroy',$product['id'])}}" onclick="return confirm('are you sure');" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

</div>
@endsection