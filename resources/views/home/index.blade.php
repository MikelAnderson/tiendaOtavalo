@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div id="carouselExampleFade" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3525" data-bs-wrap="true">
        <div class="carousel-inner">
            <div class="carousel-item image-cover active main"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{ asset('img/banner1.jpg') }})">
                <div class="carousel-caption" style="text-align: center; padding-bottom:10em">
                    <h1 style="text-shadow: 0px 3px 3px #4D4B4B">Go shopping</h1>
                    <p style="text-shadow: 0px 3px 3px #4D4B4B">We have the best price and the best quality</p>
                    <p><a class="btn btn-lg btn-primary" href="{{ route('category.index') }}" role="button">View products</a>
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

    <div class="container col-xxl-8 py-5" id="imghero">
        <div class="row flex-lg-row-reverse align-items-center g-5">
            <div class="col-10 col-sm-12 col-lg-6 col-xs-12">
                <img src="{{ asset('/img/hplaptop.png') }}" class="d-block mx-lg-auto img-fluid rounded"
                    alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Check the featured products of the season</h2>
                <p class="lead">We have a wide range of electronic products, such as computers, laptops, mobiles,... You can also comment on the product so that users can rate the product.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{route('product.featured')}}"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2" >Featured Product</button></a>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">All the products</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <div id="featured" class="carousel slide carousel-dark" data-bs-ride="carousel" data-bs-interval="3525" data-bs-wrap="true" >
            <h2 class="py-2 border-bottom">Featured Products</h2>
            <div class="carousel-inner featured-inner py-3">
                @foreach ($viewData['featuredProducts']->chunk(3) as $chunk)
                    <div class="carousel-item{{ $loop->first ? ' active' : '' }} featured">
                        <div class="card-wrapper">
                            @foreach ($chunk as $product)
                                <div class="card card-item">
                                    <div class="img-wrapper">
                                        <img src="{{ asset('/storage/' . $product->getImage()) }}" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name}}</h5>
                                        {{-- <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p> --}}
                                            <a href="{{ route('product.show', ['id' => $product->getId()]) }}" class="btn btn-outline-secondary">More details</a>
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
            <h2 class="pb-2 border-bottom">Services</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                <div class="col d-flex align-items-start">
                    <div
                        class=" d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi " width="1em" height="1em">
                            <i class="bi bi-truck"></i>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Fast delivery</h3>
                        <p>shipments to spain in 3 days. Express delivery within the whole country.</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class=" d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi " width="1em" height="1em">
                            <i class="bi bi-cash-stack"></i>
                        </svg>
                    </div>
                    <div
                        class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Free returns</h3>
                        <p>Free delivery including shipping within 3 days. 100% free product exchange within 1 week</p>
                    </div>
                </div>
                <div class="col d-flex align-items-start">
                    <div
                        class=" d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                        <svg class="bi " width="1em" height="1em">
                            <i class="bi bi-phone-flip"></i>
                        </svg>
                    </div>
                    <div>
                        <h3 class="fs-2 text-body-emphasis">Device repairs</h3>
                        <p>We repair your devices at the best price, with a 2 year warranty. We send it to you with a complimentary gift.</p>
                    </div>
                </div>
            </div>
        </div>
@endsection