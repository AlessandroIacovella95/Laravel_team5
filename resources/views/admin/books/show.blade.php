@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        {{-- Bottone Torna alla lista --}}
        <a href="{{ route('admin.books.index') }}" role="button" class="btn btn-dark ">
            <i class="fa-regular fa-circle-left me-1" style="color: #fafafa;"></i>Torna alla lista
        </a>
        {{-- Bottone Modifica --}}
        <a class="btn btn-warning " href="{{ route('admin.books.edit', $book) }}"><i class="fa-solid fa-pen-to-square me-1 "
                style="color: #000000;"></i>Modifica</a>
        {{-- Titolo --}}
        <h3 class="fw-bold my-3 text-center">Dettaglio libro</h3>
        {{-- Card Dettaglio --}}
        <div class="card w-50 mx-auto">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Titolo: </strong> {{ $book->title }}</li>
                <li class="list-group-item"><strong>Autore: </strong> {{ $book->author }}</li>
                <li class="list-group-item"><strong>Genere: </strong>
                    {{ $book->genre ? $book->genre->label : 'Nessun genere' }}</li>
                <li class="list-group-item"><strong>Anno di pubblicazione: </strong> {{ $book->publication_year }}</li>
                <li class="list-group-item"><strong>Prezzo: </strong> {{ $book->price }}$</li>
                <li class="list-group-item"><strong>Descrizione:</strong> {{ $book->abstract }}</li>
            </ul>
        </div>
    </section>
@endsection
