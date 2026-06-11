@extends('layouts.app')

@section('titulo', 'Cadastrar Novo Livro')

@section('conteudo')
<nav>
    <a href="{{ route('livros.index') }}" class="btn btn-secondary">← Voltar</a>
</nav>

<h2 style="color: #333; margin-bottom: 20px;">Cadastrar Novo Livro</h2>

<form action="{{ route('livros.store') }}" method="POST">
    @csrf

    <div class="form-row">
        <div class="form-group">
            <label for="titulo">Título *</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="form-group">
            <label for="autor">Autor *</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="ano_publicacao">Ano de Publicação *</label>
            <input type="number" id="ano_publicacao" name="ano_publicacao" min="1000" max="{{ date('Y') }}" value="{{ old('ano_publicacao') }}" required>
        </div>

        <div class="form-group">
            <label for="genero">Gênero</label>
            <input type="text" id="genero" name="genero" value="{{ old('genero') }}" placeholder="Ex: Ficção Científica">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="quantidade_paginas">Quantidade de Páginas</label>
            <input type="number" id="quantidade_paginas" name="quantidade_paginas" min="1" value="{{ old('quantidade_paginas') }}" placeholder="Ex: 350">
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select id="status" name="status" required>
                <option value="">-- Selecione um status --</option>
                @foreach ($status_opcoes as $opcao)
                    <option value="{{ $opcao }}" {{ old('status') == $opcao ? 'selected' : '' }}>{{ $opcao }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div style="display: flex; gap: 10px; justify-content: center; margin-top: 30px;">
        <button type="submit" class="btn" style="min-width: 150px;">Salvar Livro</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary" style="min-width: 150px;">Cancelar</a>
    </div>
</form>
@endsection