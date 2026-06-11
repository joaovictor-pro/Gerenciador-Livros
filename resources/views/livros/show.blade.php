@extends('layouts.app')

@section('titulo', $livro->titulo)

@section('conteudo')
<nav>
    <a href="{{ route('livros.index') }}" class="btn btn-secondary">← Voltar</a>
</nav>

<div style="background: #f9f9f9; padding: 30px; border-radius: 10px; margin-top: 20px;">
    <h2 style="color: #333; margin-bottom: 20px;">{{ $livro->titulo }}</h2>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div>
            <h4 style="color: #667eea; margin-bottom: 10px;">Autor</h4>
            <p style="font-size: 16px;">{{ $livro->autor }}</p>

            <h4 style="color: #667eea; margin-top: 20px; margin-bottom: 10px;">Ano de Publicação</h4>
            <p style="font-size: 16px;">{{ $livro->ano_publicacao }}</p>

            <h4 style="color: #667eea; margin-top: 20px; margin-bottom: 10px;">Gênero</h4>
            <p style="font-size: 16px;">{{ $livro->genero ?? '-' }}</p>
        </div>

        <div>
            <h4 style="color: #667eea; margin-bottom: 10px;">Quantidade de Páginas</h4>
            <p style="font-size: 16px;">{{ $livro->quantidade_paginas ?? '-' }}</p>

            <h4 style="color: #667eea; margin-top: 20px; margin-bottom: 10px;">Status</h4>
            <p>
                <span class="status status-{{ strtolower(str_replace('Ç', 'C', $livro->status)) }}">
                    {{ $livro->status }}
                </span>
            </p>

            <h4 style="color: #667eea; margin-top: 20px; margin-bottom: 10px;">Data de Cadastro</h4>
            <p style="font-size: 16px;">{{ $livro->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div style="display: flex; gap: 10px; margin-top: 30px;">
        <a href="{{ route('livros.edit', $livro) }}" class="btn" style="background: #eff312;">Editar</a>
        <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
        </form>
    </div>
</div>
@endsection