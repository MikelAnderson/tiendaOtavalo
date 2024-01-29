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
{{$viewData['product']->comments}}
</div>
@include('comments.list' , ['list'=>$viewData['product']->comments])


<form action="{{route('store.comment', $viewData['product']->id)}}" method="post">
  @csrf
  {{-- @if (isset($comment->id))
  <input type="hidden" name="parent_id" value="{{ $comment->id }}">
  @endif --}}
<fieldset>
  <input type="hidden" name="user_id" value="{{ \auth()->id()}}">

<div class="form-group">
  <textarea name="content" class="form-control" placeholder="Write a reply" aria-describedby="helpId"></textarea>
</div>
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-2 gap-2">
    <button type="reset" class="btn btn-light btn-sm">Cancel</button>
    <button type="submit" class="btn btn-primary btn-sm">Send Reply</button>
  </div>
</div>
</fieldset>
</form>