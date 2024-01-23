@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Edit Product
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
            </div>
          </div>
        </div>
        <div class="col">
        <div class="mb-3 row">
            <label class="col-lg-3 col-md-6 col-sm-12 col-form-label">Category:</label>
            <div class="col-lg-9 col-md-6 col-sm-12">
              <select name="category" class="form-select">
                @foreach ($viewData["categories"] as $category)
                <option value="{{ $category->getId() }}" >{{ $category->getName() }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex gap-4 py-3">
        <div class="form-check">
        <input type="hidden" name="featured" value="0" />
          <input class="form-check-input" name="featured" type="checkbox" value="1" {{ $viewData['product']->getFeatured() == 1 ? 'checked' : '' }}>
          <label class="form-check-label" for="flexCheckDefault">
            Featured Product
          </label>
        </div>
        <div class="form-check">
          <input type="hidden" name="sale" value="0" />
          <input class="form-check-input" type="checkbox" name="sale" value="1" {{ $viewData['product']->getSale() == 1 ? 'checked' : '' }}>
          <label class="form-check-label" for="flexCheckDefault">
            Product on sale
          </label>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
</div>
@endsection
