@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

<div class="container-fluid products-hero image-cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('img/bannerproductos.jpg') }} )">
    <h1>sadds</h1>
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
