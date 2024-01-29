<!-- resources/views/rich_text_content/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contenido Enriquecido</h1>
        <div>{!! $richTextContent->content !!}</div>
    </div>
@endsection