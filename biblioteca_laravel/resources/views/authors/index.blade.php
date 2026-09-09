<h1>Autores</h1>

<a href="{{ route('authors.create') }}">Novo autor</a>

@foreach ($authors as $author)
    <p>
        {{ $author->nome }}
        <a href="{{ route('authors.edit', $author) }}">Editar</a>
        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </p>
@endforeach