<!-- resources/views/rich_text_content/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Contenido Enriquecido</h1>
        <form method="post" action="{{ route('rich_text_content.store') }}">
            @csrf
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
            <button type="submit">Guardar</button>
        </form>
    </div>
@endsection