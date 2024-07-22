@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Créer un nouveau Livre</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <label for="title">Titre :</label>
            <input type="text" name="title" required>
            <br>
            <label for="author">Auteur :</label>
            <input type="text" name="author" required>
            <br>
            <label for="year">Année :</label>
            <input type="number" name="year" required>
            <br>
            <label for="genre">Genre :</label>
            <input type="text" name="genre">
            <br>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
@endsection
