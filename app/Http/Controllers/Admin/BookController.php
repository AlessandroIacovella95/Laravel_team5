<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     **@return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();

        return view('admin.books.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());
        $book = new Book;
        $book->fill($data);
        $book->save();
        return redirect()->route('admin.books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $genres = Genre::all();
        return view('admin.books.edit', compact('book', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $this->validation($request->all(), $book->id);
        $book->update($data);
        return redirect()->route('admin.books.show', $book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('admin.books.index');
    }

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:100',
                'author' => "required|string",
                'genre_id' => 'nullable|exists:genres,id',
                "publication_year" => "required|integer",
                "price" => "required",
                "abstract" => "nullable|string"
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.string' => 'Il titolo deve essere una stringa',
                'title.max' => 'Il titolo deve massimo di 100 caratteri',

                'author.required' => 'L\'autore è obbligatorio',
                'author.string' => 'L\'autore deve essere una stringa',

                'genre.exists' => 'Il genere deve appartenere alla lista dei generi',

                'publication_year.required' => 'L\'anno di pubblicazione è obbligatorio',
                'publication_year.integer' => 'L\'anno di pubblicazione deve essere un numero',

                'price.required' => 'Il prezzo è obbligatorio',

                'abstract.string' => 'La descrizione deve essere una stringa',

            ]
        )->validate();
        return $validator;
    }
}