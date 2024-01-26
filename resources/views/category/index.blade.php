@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
<div class="container">
    <div class="row">
        @foreach ($viewData['categories'] as $category)
            <div class="col-md-4 col-lg-3 mb-2">
                <a href="{{route( 'category.show', ['id' => $category->getId()]) }}" style="text-decoration: none">
                    <div class="card">
                        <img src="{{ asset('/storage/' . $category->getImage()) }}" class="card-img-top img-card" alt="...">
                        <div class="card-body text-center">
                            <h1>{{ $category->getName()}}</h1>
                        </div>
                    </div>
                </a>
                
            </div>
        @endforeach
    </div>
</div>

@endsection