<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Online Store')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/tkdsja9oy9ieq7b42jbny4mzfm3lj80n730ajzw3utg6m0bf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 

<body>
    <div class="position-fixed bottom-0 end-0 mb-5 me-5 customer" style="z-index:100">
        <a href="{{route('customer-service-chat')}}"><img src="{{ asset('/img/support.png')}}" style="filter: drop-shadow(5px 5px 2px rgba(0, 0, 0, 0.5));" width="60px"></a>
    </div>
    <header class="px-5 py-3 bg-light sticky-top">
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid d-flex justify-content-between">
                <a class="navbar-brand" href="{{ route('home.index') }}">OM Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.index') }}" tabindex="-1"
                                aria-disabled="true">HOME</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                SHOP
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('category.index')}}">Categories</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.index') }}">All the products</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('product.featured')}}">Featured products</a></li>
                                <li><a class="dropdown-item" href="{{ route('product.sale')}}">Products on sale</a></li>
                                

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.index') }}" tabindex="-1"
                                aria-disabled="true">CART</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.about') }}" tabindex="-1"
                                aria-disabled="true">ABOUT</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('myaccount.orders') }}">My Orders</a>
                            </li>
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active"
                                    onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        @endguest
                        <form action="" method="get" class="nav-item d-flex col-sm-7 gap-2">
                            @csrf
                          <input class="form-control" type="search" name="search" placeholder="Search Product" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </ul>   
                </div>
                </ul>
            </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <!-- place footer here -->
    <hr>
    <div class="container">
  <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-3 justify-content-between">
    <div class="col mb-3">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>
      <p class="text-muted">by Mikel Otavalo &copy; 2023</p>
    </div>



    <div class="col mb-3 col-sm-12">
      <h5>Services</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="{{route('category.index')}}" class="nav-link p-0 text-muted">Categoires</a></li>
        <li class="nav-item mb-2"><a href="{{ route('product.index') }}" class="nav-link p-0 text-muted">Products</a></li>
        <li class="nav-item mb-2"><a href="{{ route('product.featured')}}" class="nav-link p-0 text-muted">Featured Product</a></li>
        <li class="nav-item mb-2"><a href="{{ route('product.sale')}}" class="nav-link p-0 text-muted">On sale products</a></li>
      </ul>
    </div>

    <div class="col mb-3 ">
        <h5>About</h5>
        <ul class="nav flex-column">
          <li class="nav-item mb-2"><a href="{{ route('home.index') }}" class="nav-link p-0 text-muted">Home</a></li>
          <li class="nav-item mb-2"><a  href="{{ route('login') }}" class="nav-link p-0 text-muted">Login</a></li>
          <li class="nav-item mb-2"><a href="{{ route('register') }}" class="nav-link p-0 text-muted">Register</a></li>
          <li class="nav-item mb-2"><a href="{{route('customer-service-chat')}}" class="nav-link p-0 text-muted">Customer Service</a></li>
          <li class="nav-item mb-2"><a href="{{ route('home.about') }}" class="nav-link p-0 text-muted">About</a></li>
        </ul>
      </div>


    
  </footer>
</div>
    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
