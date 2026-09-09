<h1>Editar Livro</h1>

<form action="{{ route('books.update', $book) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $book->titulo) }}"><br>

    <label for="ano_publicacao">Ano de publicação</label>
    <input type="number" id="ano_publicacao" name="ano_publicacao" value="{{ old('ano_publicacao', $book->ano_publicacao) }}"><br>

    <label for="numero_paginas">Número de páginas</label>
    <input type="number" id="numero_paginas" name="numero_paginas" value="{{ old('numero_paginas', $book->numero_paginas) }}"><br>

    <label for="genero">Gênero</label>
    <input type="text" id="genero" name="genero" value="{{ old('genero', $book->genero) }}"><br>

    <label for="author_id">Autor</label>
    <select id="author_id" name="author_id">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>
                {{ $author->nome }}
            </option>
        @endforeach
    </select><br>

    <button type="submit">Salvar</button>
</form>