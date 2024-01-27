@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class="container-fluid products-hero image-cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/productos.jpg') }} )">
    <div class="carousel-caption" style="text-align: center; padding-bottom:15em">
        <h1 style="text-shadow: 0px 3px 3px #4D4B4B">ALL THE PRODUCTS</h1>
        <p style="text-shadow: 0px 3px 3px #4D4B4B">New, newest, clasics, retro</p>
    </div>
</div>
<div class="container py-5">
    <form action="" method="get">
    <div class="form-group">
        <label class="">Filter by category:</label>
        <select name="category_id" class="form-select col-lg-3-12">
            <option value="">All categories</option>
            @foreach ($viewData['categories'] as $category)
                <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-info">Filter</button>
    </form>       
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