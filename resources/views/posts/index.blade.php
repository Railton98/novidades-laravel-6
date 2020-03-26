@extends('layouts.app')

@section('content')
    <div class="offset-10 col-2">
        <a href="{{ route('posts.create') }}" class="btn btn-lg btn-outline-primary">Novo Post</a>
    </div>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Título</th>
                <th scope="col">Criado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <div class="row">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">ver</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">apagar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="4">
                    <p class="alert-info">Sem Registros!</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $posts->links() }}
@endsection
