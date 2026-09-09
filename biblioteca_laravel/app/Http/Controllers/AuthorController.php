<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'biografia' => 'nullable|string',
        ]);

        Author::create([
            'nome' => $request->nome,
            'nacionalidade' => $request->nacionalidade,
            'biografia' => $request->biografia,
        ]);

        return redirect()->route('authors.index');
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
        $author = Author::findOrFail($id);
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $author = Author::findOrFail($id);
    
        $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:255',
            'biografia' => 'nullable|string',
        ]);

        $author->update([
            'nome' => $request->nome,
            'nacionalidade' => $request->nacionalidade,
            'biografia' => $request->biografia,
        ]);

        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return redirect()->route('authors.index');
    }
}
