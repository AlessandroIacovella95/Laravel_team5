@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('books.index') }}" role="button" class="btn btn-success mt-3"
        >Torna alla lista
        </a>
        <h1 class="my-3">Crea un Libro</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" />

            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="author" name="author" />

            <label for="genre" class="form-label">Genere</label>
            <input type="text" class="form-control" id="genre" name="genre" />

            <label for="publication_year" class="form-label">Anno di pubblicazione</label>
            <input type="number" class="form-control" id="publication_year" name="publication_year" min="1500"
                max="2023" />


            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control" id="price" name="price" min="5"
                max="50" />

            <label for="abstract" class="form-label">Descrizione</label>
            <textarea class="form-control" id="abstract" name="abstract" rows="4"></textarea>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
