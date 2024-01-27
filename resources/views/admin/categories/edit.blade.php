@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Edit Category
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.categories.update', ['id'=> $viewData['category']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-5 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['category']->getName() }}" type="text" class="form-control">
            </div>
          </div>
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
              <div class="col-lg-5 col-md-6 col-sm-12">
                <input class="form-control" type="file" name="categoryImage">
              </div>
            </div>
          </div>
      <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </form>
  </div>
</div>
@endsection
