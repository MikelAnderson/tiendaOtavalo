@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    Products in Cart
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>${{ $product->getPrice() }}</td>
          <td></td>
          <td>
            <button class="btn bg-danger text-white mb-2">
              <a href="{{ route('cart.delete-item', array_keys(session('products')) ) }}" class="text-decoration-none text-white"  >Remove</a>
              </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      <div class="text-end">
        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
        @if (count($viewData["products"]) > 0)
        <button class="btn btn-primary mb-2" >
          <a href="{{ route('cart.purchase') }}"  class="text-decoration-none text-white" >Purchase</a>

        </button>
          <button class="btn btn-danger mb-2" >
            <a href="{{ route('cart.delete')}}" class="text-decoration-none text-white">Remove all products from Cart</a>
          </button>
        </a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
