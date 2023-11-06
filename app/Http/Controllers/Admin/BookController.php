<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Type;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(6);
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
        $types = Type::orderBy('label')->get();

        return view('admin.books.create', compact('genres', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        $book = new Book;
        $book->fill($data);
        $book->save();
        if (Arr::exists($data, "types")) $book->types()->attach($data["types"]);

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
        $types = Type::orderBy('label')->get();
        $book_types = $book->types->pluck('id')->toArray();

        return view('admin.books.edit', compact('book', 'genres', 'types', 'book_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();

        $book->update($data);
        if (Arr::exists($data, "types"))
            $book->types()->sync($data["types"]);
        else
            $book->types()->detach();
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
        $book->types()->detach();

        $book->delete();
        return redirect()->route('admin.books.index');
    }
}
