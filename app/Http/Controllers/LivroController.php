<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Listar todos os livros
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    /**
     * Mostrar formulário de criar novo livro
     */
    public function create()
    {
        $status_opcoes = ['Disponível', 'Emprestado', 'Reservado'];
        return view('livros.create', compact('status_opcoes'));
    }

    /**
     * Armazenar novo livro no banco
     */
    public function store(Request $request)
    {
        $validado = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer|min:1000|max:' . date('Y'),
            'genero' => 'nullable|string|max:100',
            'quantidade_paginas' => 'nullable|integer|min:1',
            'status' => 'required|in:Disponível,Emprestado,Reservado',
        ]);

        Livro::create($validado);

        return redirect()->route('livros.index')
                        ->with('sucesso', 'Livro cadastrado com sucesso!');
    }

    /**
     * Exibir detalhes de um livro
     */
    public function show(Livro $livro)
    {
        return view('livros.show', compact('livro'));
    }

    /**
     * Mostrar formulário de editar livro
     */
    public function edit(Livro $livro)
    {
        $status_opcoes = ['Disponível', 'Emprestado', 'Reservado'];
        return view('livros.edit', compact('livro', 'status_opcoes'));
    }

    /**
     * Atualizar livro no banco
     */
    public function update(Request $request, Livro $livro)
    {
        $validado = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer|min:1000|max:' . date('Y'),
            'genero' => 'nullable|string|max:100',
            'quantidade_paginas' => 'nullable|integer|min:1',
            'status' => 'required|in:Disponível,Emprestado,Reservado',
        ]);

        $livro->update($validado);

        return redirect()->route('livros.index')
                        ->with('sucesso', 'Livro atualizado com sucesso!');
    }

    /**
     * Deletar um livro
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();

        return redirect()->route('livros.index')
                        ->with('sucesso', 'Livro deletado com sucesso!');
    }
}