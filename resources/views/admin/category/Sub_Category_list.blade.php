@extends('admin.admin')
@section('content')
<div class="card-body">
  <h4 class="card-title"> Sub_Category List</h4>
  <p class="card-description">
  </p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>id</th>
        <th>Category</th>
        <th> Title </th>
        <th>Discreption</th>
        <th>Image</th>
        <th> Status </th>
        <th> Created_At</th>
        <th> Operation</th>
      </tr>
    </thead>
    <tbody>
      @foreach($subcategories as $category)
      <tr class="table-info">
        <td>{{$category['id']}}</td>
        <td>{{$category->category['title']}}</td>
        <td>{{$category['title']}} </td>
        <td>{{$category['discreption']}} </td>
        <td> <img src="{{asset('images/'. $category->Image)}}" width="100" height="100"></td>
        <td> {{$category['status']}} </td>
        <td> {{date('d-m-y',strtotime($category['created_at']))}} </td>
        <td><a href="{{route('subcategories.edit',$category['id'])}}" class="btn btn-success">edit</a>
          <a href="{{route('subcategories.destroy',$category['id'])}}" onclick="return confirm('are you sure');" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
  
</div>
@endsection