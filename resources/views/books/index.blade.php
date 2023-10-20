@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <a href="{{ route('books.create') }}" role="button" class="btn btn-success"
        >Crea libro
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Genere</th>
                    <th scope="col">Anno di Pubblicazione</th>
                    <th scope="col">Prezzi</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->price }}$</td>
                        <td>{{ $book->abstract }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}"> Dettaglio </a>
                            <a href="{{ route('books.edit', $book) }}">Modifica</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
