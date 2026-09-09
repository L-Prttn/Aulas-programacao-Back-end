<h1>Novo autor</h1>

<form action="{{ route('authors.store') }}" method="POST">
    @csrf

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" value="{{ old('nome') }}"><br>

    <label for="nacionalidade">Nacionalidade</label>
    <input type="text" id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade') }}"><br>

    <label for="biografia">Biografia</label>
    <textarea id="biografia" name="biografia">{{ old('biografia') }}</textarea><br>

    <button type="submit">Salvar</button>
</form>