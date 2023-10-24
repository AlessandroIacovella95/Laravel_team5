@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('admin.books.index') }}" role="button" class="btn btn-success mt-3">Torna alla lista
        </a>
        <h1 class="my-3">Crea un Libro</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <h4>Correggi i seguenti errori per proseguire:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.books.store') }}" method="POST">
            @csrf

            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" />
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                value="{{ old('author') }}" />
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="genre" class="form-label">Genere</label>
            <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre"
                value="{{ old('genre') }}" />
            @error('genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="publication_year" class="form-label">Anno di pubblicazione</label>
            <input type="number" class="form-control @error('publication_year') is-invalid @enderror" id="publication_year"
                name="publication_year" min="1500" max="2023" value="{{ old('publication_year') }}" />
            @error('publication_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="price" class="form-label">Prezzo</label>
            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') }}" />
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="abstract" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('abstract') is-invalid @enderror" id="abstract"
                name="abstract" value="{{ old('abstract') }}" />
            @error('abstract')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection
