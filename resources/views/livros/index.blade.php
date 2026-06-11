@extends('layouts.app')

@section('titulo', 'Meus Livros')

@section('conteudo')
<nav>
    <a href="{{ route('livros.create') }}" class="btn">Adicionar Novo Livro</a>
</nav>

@if ($livros->count() > 0)
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Gênero</th>
                <th>Páginas</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td><strong>{{ $livro->titulo }}</strong></td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->ano_publicacao }}</td>
                    <td>{{ $livro->genero ?? '-' }}</td>
                    <td>{{ $livro->quantidade_paginas ?? '-' }}</td>
                    <td>
                        <span class="status status-{{ strtolower(str_replace('Ç', 'C', $livro->status)) }}">
                            {{ $livro->status }}
                        </span>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('livros.show', $livro) }}" class="btn" style="background: #3460db;">Ver</a>
                            <a href="{{ route('livros.edit', $livro) }}" class="btn" style="background: #f3e412;">Editar</a>
                            <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="empty-state">
        <p style="font-size: 18px;">Nenhum livro cadastrado ainda</p>
        <p style="margin-top: 10px;">
            <a href="{{ route('livros.create') }}" class="btn">Adicionar o Primeiro Livro</a>
        </p>
    </div>
@endif
@endsection