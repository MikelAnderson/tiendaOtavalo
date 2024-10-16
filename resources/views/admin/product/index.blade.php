@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Create Products
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ old('price') }}" type="number" class="form-control">
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
                <option value="{{old('category')}}">Select a category</option>
                @foreach ($viewData["categories"] as $category)
                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex gap-4 py-3">
        <div class="form-check">
          <input type="hidden" name="featured" value="0" />
          <input class="form-check-input" name="featured" type="checkbox" value="1" >
          <label class="form-check-label" for="flexCheckDefault">
            Featured Product
          </label>
        </div>
        <div class="form-check">
          <input type="hidden" name="sale" value="0" />
          <input class="form-check-input" type="checkbox" name="sale" value="1" >
          <label class="form-check-label" for="flexCheckDefault">
            Product on sale
          </label>
        </div>
      </div>
      <div class="col">
        <div class="mb-3 row">
          <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Discounted Price:</label>
          <div class="col-lg-10 col-md-6 col-sm-12">
            <input name="discountedPrice" value="{{ old('discountedPrice') }}" type="number" class="form-control">
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea id="mytextarea" class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header">
    Manage Products
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Category</th>
          <th scope="col">Featured</th>
          <th scope="col">On Sale</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>{{ $product->getPrice() }}</td>
          <td>{{ $product->categories ? $product->categories->name :'No category'}}</td>
          <td>{{ $product->getFeatured() }}</td>
          <td>{{ $product->getSale() }}</td>
          <td>
            <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
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