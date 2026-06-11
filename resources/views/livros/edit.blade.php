@extends('layouts.app')

@section('titulo', 'Editar Livro')

@section('conteudo')
<nav>
    <a href="{{ route('livros.index') }}" class="btn btn-secondary">← Voltar</a>
</nav>

<h2 style="color: #333; margin-bottom: 20px;">Editar Livro</h2>

<form action="{{ route('livros.update', $livro) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class="form-group">
            <label for="titulo">Título </label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $livro->titulo) }}" required>
        </div>

        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor', $livro->autor) }}" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação *</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao" min="1000" max="{{ date('Y') }}" value="{{ old('ano_publicacao', $livro->ano_publicacao) }}" required>
        </div>

        <div class="form-group">
            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" value="{{ old('genero', $livro->genero) }}" placeholder="Ex: Ficção Científica">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="quantidade_paginas">Quantidade de Páginas</label>
            <input type="number" id="quantidade_paginas" name="quantidade_paginas" min="1" value="{{ old('quantidade_paginas', $livro->quantidade_paginas) }}" placeholder="Ex: 350">
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="">Selecione um status</option>
                @foreach ($status_opcoes as $opcao)
                    <option value="{{ $opcao }}" {{ old('status', $livro->status) == $opcao ? 'selected' : '' }}>{{ $opcao }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
        <button type="submit" class="btn" style="min-width: 150px;">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary" style="min-width: 150px;">Cancelar</a>
    </div>
</form>
@endsection