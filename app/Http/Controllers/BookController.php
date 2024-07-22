<?php

namespace App\Http\Controllers;

use App\Models\EloquentBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = EloquentBook::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/\S/'],
            'author' => ['required', 'string', 'max:255', 'regex:/\S/'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.date('Y')],
            'genre' => ['nullable', 'string', 'max:255'],
        ]);

        $book = new EloquentBook([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'year' => $request->get('year'),
            'genre' => $request->get('genre'),
        ]);

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livre ajouté avec succès');
    }

    public function edit($id)
    {
        $book = EloquentBook::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', 'regex:/\S/'],
            'author' => ['required', 'string', 'max:255', 'regex:/\S/'],
            'year' => ['required', 'integer', 'min:1900', 'max:'.date('Y')],
            'genre' => ['nullable', 'string', 'max:255'],
        ]);

        $book = EloquentBook::findOrFail($id);
        $book->title = $request->get('title');
        $book->author = $request->get('author');
        $book->year = $request->get('year');
        $book->genre = $request->get('genre');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Livre mis à jour avec succès');
    }

    public function destroy($id)
    {
        $book = EloquentBook::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livre supprimé avec succès');
    }
}
