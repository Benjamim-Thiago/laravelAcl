<div class="container">
    @forelse($posts as $post)
        @can('view_post', $post)
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p><br>
            <b> Author: {{ $post->user->name }}</b><br>
            <a href="{{ url("/posts/$post->id/update") }}">Editar</a>
        @endcan
        <hr>
    @empty
        <p>Nenhum Post Cadastrado!</p>
    @endforelse
</div>
