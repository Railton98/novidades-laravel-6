@extends('layouts.app')

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input name="title" id="title" type="text" class="form-control" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">
                {{ $post->description }}
            </textarea>
        </div>
        <button type="submit" class="btn btn-lg btn-dark">Salvar</button>
    </form>
@endsection
