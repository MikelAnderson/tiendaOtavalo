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
            {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
          </h5>
          <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
          <p class="card-text">
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

<div>
  @foreach ($viewData['comments'] as $comment)
    <div>
      {{ $comment->content() }}
    </div>
  @endforeach
</div>


<div class="container">
  <form action="{{route('product.comment')}}" method="post">
    @csrf

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{$error}}</p>
    @endforeach

    @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
    @endif

    <input type="hidden" name="product_id" value="{{ $viewData['product']->getId() }}">

    <fieldset>
      <legend>Comment</legend>
      <div class="form-group">
        <label for="">Your comment</label>
        <textarea name="content" id="content" class="form-control" placeholder="" aria-describedby="helpId"></textarea>
        <small id="helpId" class="text-muted">Help text</small>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="reset" class="btn bnt-default">Cancel</button>
          <button type="submit" class="btn btn-primary">Comment Product</button>
        </div>
      </div>
    </fieldset>

  </form>
</div>
@endsection
