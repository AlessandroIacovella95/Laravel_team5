<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('types:id,label', 'genre:id,label')
            ->orderBy('id', 'desc')
            ->paginate(5);
        return response()->json($books);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('types:id,label', 'genre:id,label')
            ->where('id', $id)
            ->first();

        if (!$book)
            abort(404, "Libro non trovato");

        return response()->json($book);

    }

}