@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container-fluid products-hero image-cover" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/categories.jpg') }} )">
    <div class="carousel-caption" style="text-align: center; padding-bottom:15em">
        <h1 style="text-shadow: 0px 3px 3px #4D4B4B">CATEGORIES</h1>
        <p style="text-shadow: 0px 3px 3px #4D4B4B">Find what you are looking for</p>
    </div>
</div>
<div class="container py-5">
    <h2 class="text-center border-bottom py-3">Select a category:</h2>
    <div class="row py-3">
        @foreach ($viewData['categories'] as $category)
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{route( 'category.show', ['id' => $category->getId()]) }}" style="text-decoration: none">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $category->getImage()) }}" class="card-img-top img-card" alt="...">
                        <div class="card-body text-center">
                            <h2 class="category-name">{{ $category->getName()}}</h2>
                        </div>
                    </div>
                </a>
                
            </div>
        @endforeach
    </div>
</div>

@endsection