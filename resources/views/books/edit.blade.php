@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Modifier le Livre : {{ $book->title }}</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <label for="title">Titre :</label>
            <input type="text" name="title" value="{{ $book->title }}" required>
            <br>
            <label for="author">Auteur :</label>
            <input type="text" name="author" value="{{ $book->author }}" required>
            <br>
            <label for="year">Année :</label>
            <input type="number" name="year" value="{{ $book->year }}" required>
            <br>
            <label for="genre">Genre :</label>
            <input type="text" name="genre" value="{{ $book->genre }}">
            <br>
            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>
@endsection