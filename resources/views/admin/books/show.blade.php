@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <a href="{{ route('admin.books.index') }}" role="button" class="btn btn-success">Torna alla lista
        </a>
        <a href="{{ route('admin.books.edit', $book) }}" role="button" class="btn btn-warning">Modifica
        </a>
        <h1 class="fw-bold mb-3">Dettaglio libro</h1>
        <strong>Titolo: </strong> {{ $book->title }} <br />
        <strong>Autore: </strong> {{ $book->author }} <br />
        <strong>Genere: </strong> {{ $book->genre ? $book->genre->label : 'Nessun genere' }} <br />
        <strong>Anno di pubblicazione: </strong> {{ $book->publication_year }} <br />
        <strong>Prezzo: </strong> {{ $book->price }}$ <br />
        <strong>Descrizione:</strong> {{ $book->abstract }} <br />
    </section>
@endsection
