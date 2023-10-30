@extends('layouts.app')

@section('main-content')
    <section class="container mt-5">

        <div class="d-flex align-items-center">
            <h1 class="fw-bold mb-3">Lista libri</h1>
            <a href="{{ route('admin.books.create') }}" role="button" class="btn btn-primary ms-auto me-2"><i
                    class="fa-solid fa-plus mx-2" style="color: #ffffff;"></i>Crea libro
            </a>
        </div>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Genere</th>
                    <th scope="col">Pubblicazione</th>
                    <th scope="col">Prezzi</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="text-center">
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre?->label }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>{{ $book->price }}$</td>
                        <td>{{ $book->abstract }}</td>
                        <td>
                            {{-- Bottone Dettaglio --}}
                            <a class="btn btn-sm btn-success w-100" href="{{ route('admin.books.show', $book) }}"><i
                                    class="fa-solid fa-circle-info me-1" style="color: #ffffff;"></i> Dettaglio </a>
                            {{-- Bottone Modifica --}}
                            <a class="btn btn-warning btn-sm w-100 my-1" href="{{ route('admin.books.edit', $book) }}"><i
                                    class="fa-solid fa-pen-to-square me-1 " style="color: #000000;"></i>Modifica</a>
                            {{-- Bottone Elimina --}}
                            <a href="#" type="button" class="btn btn-danger btn-sm  w-100" data-bs-toggle="modal"
                                data-bs-target="#delete-modal-{{ $book->id }}"><i class="fa-solid fa-trash me-2"
                                    style="color: #ffffff;"></i>
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
                                            <button type="button" class="btn btn-secondary"
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
        {{ $books->links('pagination::bootstrap-5') }}
    </section>

    {{ $books->links('pagination::bootstrap-5') }}
@endsection
