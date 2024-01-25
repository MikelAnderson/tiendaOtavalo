@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div id="#carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3500"
        data-bs-wrap="true">
        <div class="carousel-inner">
            <div class="carousel-item image-cover active main" 
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('img/banner.jpg') }})">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item image-cover main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('img/banner2.jpg') }} )">
                <div class="carousel-caption d-none d-md-block">
                    <h5>second slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item image-cover main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('img/banner3.jpg') }})">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev d-none" type="button" data-bs-target="#carouselExampleFade"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next d-none" type="button" data-bs-target="#carouselExampleFade"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="col-lg-12">
        <form action="" method="get" class="d-flex gap-2">
            <label class="col-lg7">Filter by category</label>
            <select name="category_id" class="form-select">
                <option value="">All categories</option>
                @foreach ($viewData['categories'] as $category)
                    <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-info">Filter</button>
        </form>



    </div>
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
@endsection
