@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
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
          </tr>
          @endforeach
      </tbody>
  </table>
  </section>
@endsection