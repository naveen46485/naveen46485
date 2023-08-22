@extends('admin.admin')
@section('content')
<div class="card-body">
  <h4 class="card-title">Category List</h4>
  <p class="card-description">
  </p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th> Title </th>
        <th> Status </th>
        <th> Created_At</th>
        <th> Operation</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr class="table-info">
        <td>{{$category['id']}}</td>
        <td>{{$category['title']}} </td>
        <td> {{$category['status']}} </td>
        <td> {{date('d-m-y',strtotime($category['created_at']))}} </td>
        <td><a href="{{route('categories.edit',$category['id'])}}" class="btn btn-success">edit</a>
          <a href="{{route('sub_category.delete',$category['id'])}}" onclick="return confirm('are you sure');" class="btn btn-danger">delete</a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>

</div>
@endsection