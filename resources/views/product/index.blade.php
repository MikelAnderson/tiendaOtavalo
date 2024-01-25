@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container-fluid">
  <form action="" method="get">
    <label>Filter by category</label>
    <select name="category_id" class="form-select">
      @foreach ($viewData['categories'] as $category)
      <option value="{{ $category->getId()}}">{{ $category->getName()}}</option>
      @endforeach
    </select>
    <button
      type="submit"
      class="btn btn-primary"
    >
      Submit
    </button>
    
  </form>
    


</div>
<div class="row">
  @foreach ($viewData["products"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white">{{ $product->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

@section('javascripts')
    <script>
      $(document).ready(function () {
        var products = $('#datatable').Datatable({
          'ajax'
        })
      })
    </script>
@endsection