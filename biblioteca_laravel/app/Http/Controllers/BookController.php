<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->get();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'numero_paginas' => 'required|integer',
            'genero' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        Book::create([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'numero_paginas' => $request->numero_paginas,
            'genero' => $request->genero,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $authors = Author::all();

        return view('books.edit', compact('book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'numero_paginas' => 'required|integer',
            'genero' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
        ]);

        $book->update([
            'titulo' => $request->titulo,
            'ano_publicacao' => $request->ano_publicacao,
            'numero_paginas' => $request->numero_paginas,
            'genero' => $request->genero,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
