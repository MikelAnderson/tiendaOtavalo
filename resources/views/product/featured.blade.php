@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')

<div class="carousel-inner">
    <div class="carousel-item image-cover active main"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('/img/featured.jpg')  }} )">
        <div class="carousel-caption" style="text-align: center; padding-bottom:15em">
            <h1 style="text-shadow: 0px 3px 3px #4D4B4B">{{ $viewData['title']}}</h1>
            <p style="text-shadow: 0px 3px 3px #4D4B4B">Category / {{ $viewData['title']}}</p>
        </div>
    </div>
</div>

<h1 class="text-center my-5 pb-3 border-bottom">{{ $viewData['title']}}</h1>


<div class="container gap-2 d-flex mt-100">
    <div class="row d-flex">
        @foreach ($viewData['featuredProducts'] as $product)
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

@endsection