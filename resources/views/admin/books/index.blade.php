@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">
        <a href="{{ route('admin.books.create') }}" role="button" class="btn btn-success">Crea libro
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
                        <td>{{ $book->genre?->label }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->price }}$</td>
                        <td>{{ $book->abstract }}</td>
                        <td>
                            <a href="{{ route('admin.books.show', $book) }}"> Dettaglio </a>
                            <a href="{{ route('admin.books.edit', $book) }}">Modifica</a>
                            <a href="#" type="button" class="" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $book->id }}">
                                Elimina
                            </a>

                            <div class="modal fade" id="delete-modal-{{ $book->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina elemento</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Vuoi davvero eliminare il libro {{ $book->title }}?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Elimina</button>
                                            </form>
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Annulla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
