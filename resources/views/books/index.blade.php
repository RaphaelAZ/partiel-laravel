@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Livres</h1>
        <a href="{{ route('books.create') }}">Créer un nouveau livre</a>
        <ul>
            @foreach ($books as $book)
                <li>
                    {{ $book->title }} - {{ $book->author }} ({{ $book->year }}) @if($book->genre) - Genre: {{ $book->genre }} @endif
                    <a href="{{ route('books.edit', $book->id) }}" class="update-button">Modifier</a>
                    <form action="{{ route('books.delete', $book->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection