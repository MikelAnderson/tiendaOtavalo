@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')


<div class="card">
  <div class="card-header">
    Manage Comments
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">User name</th> 
          <th scope="col">ID_product</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["comments"] as $comment)
        <tr>
          <td>{{ $comment->id }}</td>
          <td>{{ $comment->content }}</td>
          <td>{{ $comment->product_id }}</td>

          <td>
            <a class="btn btn-primary" href="{{route('admin.comments.edit', ['id'=> $comment->id])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.comments.delete', $comment->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection