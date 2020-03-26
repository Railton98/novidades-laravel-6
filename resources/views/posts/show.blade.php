@extends('layouts.app')

@section('content')
    <div class="form-group">
        <label for="title">Título</label>
        <input disabled name="title" id="title" type="text" class="form-control" value="{{ $post->title }}">
    </div>
    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea disabled name="description" id="description" cols="30" rows="10" class="form-control">
            {{ $post->description }}
        </textarea>
    </div>
    <a href="{{ route('posts.index') }}" class="btn btn-lg btn-warning">Voltar</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-lg btn-dark">Editar</a>
@endsection
