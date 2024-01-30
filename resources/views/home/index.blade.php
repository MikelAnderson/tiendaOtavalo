@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3525" data-bs-wrap="true">
        <div class="carousel-inner">
            <div class="carousel-item image-cover active main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/banner1.jpg') }})">
                <div class="carousel-caption" style="text-align: center; padding-bottom:10em">
                    <h1 style="text-shadow: 0px 3px 3px #4D4B4B">A WIDE VARIETY OF ELECTRONIC DEVICES</h1>
                    <p style="text-shadow: 0px 3px 3px #4D4B4B">We have the best price and the best quality</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ route('category.index') }}" role="button">Go shop now</a>
                    </p>
                </div>
            </div>
            <div class="carousel-item image-cover main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/banner2.jpg') }} )">
                <div class="carousel-caption" style="text-align: center; padding-bottom:10em">
                    <h1 style="text-shadow: 0px 3px 3px #4D4B4B">ON SALE PRODUCTS</h1>
                    <p style="text-shadow: 0px 3px 3px #4D4B4B">See our products with a great discount</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ route('product.sale') }}" role="button">Go shop now</a>
                    </p>
                </div>
            </div>
            <div class="carousel-item image-cover main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{ asset('img/banner3.jpg') }})">
                <div class="carousel-caption" style="text-align: center; padding-bottom:10em">
                    <h1 style="text-shadow: 0px 3px 3px #4D4B4B">JOIN US</h1>
                    <p style="text-shadow: 0px 3px 3px #4D4B4B">Now you can register for free!</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}" role="button">Register for free</a>
                    </p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container col-xxl-8 px-4 py-5" id="imghero">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-12 col-lg-6 col-xs-12">
                <img src="{{ asset('/img/hplaptop.png') }}" class="d-block mx-lg-auto img-fluid rounded"
                    alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h2>
                <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                    extensive prebuilt components, and powerful JavaScript plugins.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 mt-5">
        <div id="featured" class="carousel slide carousel-dark" data-bs-ride="carousel" data-bs-interval="3525" data-bs-wrap="true" >
            <h2 class="py-2 border-bottom">Featured Products</h2>
            <div class="carousel-inner featured-inner">
                @foreach ($viewData['featuredProducts']->chunk(3) as $chunk)
                    <div class="carousel-item{{ $loop->first ? ' active' : '' }} featured">
                        <div class="card-wrapper">
                            @foreach ($chunk as $product)
                                <div class="card card-item">
                                    <div class="img-wrapper">
                                        <img src="{{ asset('/storage/' . $product->getImage()) }}" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <button class="carousel-control-prev" type="button" data-bs-target="#featured" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#featured" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="container px-4 py-5 mt-5" id="hanging-icons">
            <h2 class="pb-2 border-bottom">Hanging icons</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#toggles2" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#cpu-fill" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi" width="1em" height="1em">
                            <use xlink:href="#tools" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Featured title</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                            sentence
                            and probably just keep going until we run out of words.</p>
                        <a href="#" class="btn btn-primary">
                            Primary button
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-100">
            <div class="row">
                <div class="col-md-3">
                    <div class="product-wrapper mb-45 text-center">
                        <div class="product-img"> 
                            <a href="#" data-abc="true"> 
                            <img src="https://i.imgur.com/tL7ZE46.jpg" alt=""> 
                            </a> 
                            <span class="text-center"><i class="fa fa-rupee"></i> 43,000</span>
                            <div class="product-action">
                                <div class="product-action-style"> 
                                    <a href="#"> <i class="fa fa-plus"></i></a> 
                                    <a href="#"> <i class="fa fa-heart"></i> </a> 
                                    <a href="#"> <i class="fa fa-shopping-cart"></i> </a> 
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>

    @endsection
