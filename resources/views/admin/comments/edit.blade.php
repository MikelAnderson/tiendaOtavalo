@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header">
    Edit Comment
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.comments.update', ['id'=> $viewData['comments']->getId()]) }}">
      @csrf
      @method('PUT')
     <div class="form-check">
       <label class="form-check-label">Posted
         <input type="hidden" name="posted" value="0" />
         <input class="form-check-input" type="checkbox" name="posted" value="1" {{ $viewData['comments']->getPosted() == 1 ? 'checked' : '' }}> 
       </label>
     </div>
     <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>

    
  </div>
</div>
@endsection
