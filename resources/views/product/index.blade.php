@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class="carousel-inner">
    <div class="carousel-item image-cover active main"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/productos.jpg') }})">
        <div class="carousel-caption" style="text-align: center; padding-bottom:10em">
            <h1 style="text-shadow: 0px 3px 3px #4D4B4B">A WIDE VARIETY OF ELECTRONIC DEVICES</h1>
            <p style="text-shadow: 0px 3px 3px #4D4B4B">We have the best price and the best quality</p>
        </div>
    </div>
</div>



<div class="container py-5" >
    <div class="row d-flex">
      <div class="col col-2">
        <label for="opciones" class="form-label">Filter products by category: </label>
      </div>
      <div class="col col-3">
    <form action="" method="get">
        <select name="category_id" class="form-select col-2">
            <option value="">All categories</option>
            @foreach ($viewData['categories'] as $category)
                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
            @endforeach
        </select>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-success">Filter</button>
      </div>
    </form>       
    </div>
  </div>


  <div class="container gap-2 d-flex mt-100">
    <div class="row d-flex">
        @foreach ($viewData['products'] as $product)
        <div class="col-md-3">
            <div class="product-wrapper mb-45 text-center">
                <div class="product-img"> 
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}" data-abc="true"> 
                    <img src="{{ asset('/storage/' . $product->getImage()) }}"  class="img-fluid"> 
                    </a> 
                    <span class="text-center">{{ $product->getPrice()}} €</span>
                    <div class="product-action">
                        <div class="product-action-style"> 
                             <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="text-decoration-none text-color-white">
                                <p>{{  $product->getName() }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
     </div>
     @endforeach

</div>

@endsection