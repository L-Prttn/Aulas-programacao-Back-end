<h1>Livros</h1>

<a href="{{ route('books.create') }}">Novo livro</a>

@foreach ($books as $book)
    <p>
        {{ $book->titulo }} — {{ $book->author->nome }}
        <a href="{{ route('books.edit', $book) }}">Editar</a>
        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Excluir</button>
        </form>
    </p>
@endforeach