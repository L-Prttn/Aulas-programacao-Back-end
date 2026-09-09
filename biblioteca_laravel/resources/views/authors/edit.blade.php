<h1>Editar autor</h1>

<form action="{{ route('authors.update', $author) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome', $author->nome) }}"><br>

    <label for="nacionalidade">Nacionalidade</label>
    <input type="text" id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade', $author->nacionalidade) }}"><br>

    <label for="biografia">Biografia</label>
    <textarea id="biografia" name="biografia">{{ old('biografia', $author->biografia) }}</textarea><br>

    <button type="submit">Salvar</button>
</form>