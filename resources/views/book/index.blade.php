@extends('layouts.app')

@section('main-content')
  <section class="container mt-5">
      <div class="container">    
        <h1>Books</h1>
        <div class="row">
          @foreach ($books as $book)
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">{{ $book->title }}</h5>
                  <p class="card-text">
                    <strong>Autore:</strong> {{ $book->author }}<br>
                    <strong>Genere:</strong> {{ $book->genre }}<br>
                    <strong>Anno di pubblicazione:</strong> {{ $book->publication_year }}<br>
                    <strong>Prezzo:</strong> {{ $book->price }}
                    <strong>Trama:</strong> {{ $book->abstract }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
  </section>
@endsection