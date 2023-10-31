@extends('layouts.app')

@section('main-content')
    <div class="container">
        {{-- Bottone Torna alla lista --}}
        <a href="{{ route('admin.books.index') }}" role="button" class="btn btn-dark my-3">
            <i class="fa-regular fa-circle-left me-1 " style="color: #fafafa;"></i>Torna alla lista
        </a>
        <h1 class="mb-3 text-center">Crea un Libro</h1>
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
        <form action="{{ route('admin.books.store') }}" method="POST" class="row g-3">
            @csrf
            {{-- Titolo --}}
            <div class="col-6 mt-3 fw-bold"> <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ old('title') }}" />
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Autore --}}
            <div class="col-6 mt-3 fw-bold"> <label for="author" class="form-label">Autore</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                    name="author" value="{{ old('author') }}" />
                @error('author')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Genere --}}
            <div class="col-4 mt-3 fw-bold"> <label for="genre_id" class="form-label">Genere</label>
                <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                    <option value="">Nessun genere</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" @if (old('genre_id') == $genre->id) selected @endif>
                            {{ $genre->label }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- Anno di pubblicazione --}}
            <div class="col-4 mt-3 fw-bold"> <label for="publication_year" class="form-label">Anno di pubblicazione</label>
                <input type="number" class="form-control @error('publication_year') is-invalid @enderror"
                    id="publication_year" name="publication_year" min="1500" max="2023"
                    value="{{ old('publication_year') }}" />
                @error('publication_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Prezzo --}}
            <div class="col-4 mt-3 fw-bold"> <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price') }}" />
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Descrizione --}}
            <div class="col-12 mt-3 fw-bold"> <label for="abstract" class="form-label">Descrizione</label>
                <input type="text" class="form-control @error('abstract') is-invalid @enderror" id="abstract"
                    name="abstract" value="{{ old('abstract') }}" />
                @error('abstract')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 my-3">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
        </form>
    </div>
@endsection
