@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <h1 class="fw-bold mb-3">Dettaglio libro</h1>
        <strong>Titolo: </strong> {{ $book->title }} <br />
        <strong>Autore: </strong> {{ $book->author }} <br />
        <strong>Genere: </strong> {{ $book->genre }} <br />
        <strong>Anno di pubblicazione: </strong> {{ $book->publication_year }} <br />
        <strong>Prezzo: </strong> {{ $book->price }} <br />
        <strong>Descrizione:</strong> {{ $book->abstract }} <br />
    </section>
@endsection
