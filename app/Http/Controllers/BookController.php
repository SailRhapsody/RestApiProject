<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::indexBooks();

        return BookResource::collection($books);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $book = Book::storeBook($data);

        return BookResource::make($book);
    }

    public function show(Book $book)
    {
        //here is test show
        return BookResource::make($book);
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $book = Book::updateBook($book, $data);

        return BookResource::make($book);
    }

    public function destroy(Book $book)
    {
        //test
        Book::destroyBook($book);

        return response()->json([
            'message' => 'done',
        ]);
    }
}
