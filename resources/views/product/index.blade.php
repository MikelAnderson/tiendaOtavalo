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
            <p><a class="btn btn-lg btn-primary" href="{{ route('category.index') }}" role="button">Go shop now</a>
            </p>
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
                    <a href="#" data-abc="true"> 
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

</div>

<div class="container p-2">
    <div class="row">
        @foreach ($viewData['products'] as $product)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <img src="{{ asset('/storage/' . $product->getImage()) }}" class="card-img-top img-card">
                    <div class="card-body text-center">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                            class="btn bg-primary text-white">{{ $product->getName() }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
@endsection