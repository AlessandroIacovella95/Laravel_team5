@extends('layouts.app')

@section('main-content')
    <div class="container">
        <a href="{{ route('admin.books.index') }}" role="button" class="btn btn-success mt-3">Torna alla lista
        </a>
        <a href="{{ route('admin.books.show', $book) }}" role="button" class="btn btn-success mt-3">Dettagli
        </a>
        <h1 class="my-3">Modifica un Libro</h1>
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
        <form action="{{ route('admin.books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') ?? $book->title }}" />
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="author" class="form-label">Autore</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
                value="{{ old('author') ?? $book->author }}" />
            @error('author')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="genre_id" class="form-label">Genere</label>
            <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                <option value="">Nessun genere</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @if (old('genre_id') ?? $book->genre_id == $genre->id) selected @endif>
                        {{ $genre->label }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <label for="publication_year" class="form-label">Anno di pubblicazione</label>
            <input type="number" class="form-control @error('publication_year') is-invalid @enderror" id="publication_year"
                name="publication_year" value="{{ old('publication_year') ?? $book->publication_year }}" />
            @error('publication_year')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="price" class="form-label">Prezzo</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                value="{{ old('price') ?? $book->price }}" />
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="abstract" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('abstract') is-invalid @enderror" id="abstract"
                name="abstract" value="{{ old('abstract') ?? $book->abstract }}" />
            @error('abstract')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
    </div>
@endsection
