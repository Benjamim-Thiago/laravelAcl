@extends('layouts.app')

@section('content')
    <div class="container">
        @forelse($posts as $post)
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p><br>
            <b> Author: {{ $post->user->name }}<br>
            @can('update-post', $post)
                <a href="{{ url("/posts/$post->id/update") }}">Editar</a>
            @endcan
            <hr>
            @empty
                <p>Nenhum Post Cadastrado!</p>
        @endforelse
    </div>
@endsection
