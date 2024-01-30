@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="container">
  <div class="card mb-3">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">
            @if ($viewData['product']->getSale())
            {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getDiscountedPrice() }})
            @else
            {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})

            @endif
          </h5>
          <p class="card-text">{{{ $viewData["product"]->getDescription() }}}</p>
          <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
            <div class="row">
              @csrf
              <div class="col-auto">
                <div class="input-group col-auto">
                  <div class="input-group-text">Quantity</div>
                  <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                </div>
              </div>
              <div class="col-auto">
                <button class="btn bg-primary text-white" type="submit">Add to cart</button>
              </div>
            </div>
          </form>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8 border rounded p-5">
      <h2>Comment the product</h2>
      <form action="{{route('store.comment', $viewData['product']->id)}}" method="post">
        @csrf
        <div class="mb-3">
          <fieldset>
            <input type="hidden" name="user_id" value="{{ \auth()->id()}}">
          <div class="form-group">
            <textarea name="content" class="form-control" placeholder="Write a comment about this product" aria-describedby="helpId"></textarea>
          </div>
          </fieldset>
        </div>
        <div class="d-flex justify-content-end gap-2">
          <button type="reset" class="btn btn-danger">Cancel</button>
          <button type="submit" class="btn btn-success">Comment</button>
        </div>
             
      </form>
    </div>
  </div>
</div>


<div class=" pt-5">
  <h3 class="text-center">Comments about this product:</h3>
  @include('comments.list' , ['list'=>$viewData['product']->comments])
</div>

@endsection