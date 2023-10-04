<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\StoreRequest;
use App\Http\Requests\Book\UpdateRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->paginate(20);
        $books->appends(request()->query());

        return BookResource::collection($books);
    }

    public function store(StoreRequest $request)
    {
        $data    = $request->validated();
        $book    = Book::query()->create([
            'title'        => $data['title'],
            'description'  => $data['description'],
            'published_at' => $data['published_at'],
        ]);
        $authors = Author::query()->whereIn('id', $data['authors'])->get();
        $book->authors()->attach($authors);

        return BookResource::make($book);
    }

    public function show(Book $book)
    {
        return BookResource::make($book);
    }

    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update([
            'title'        => $data['title'],
            'description'  => $data['description'],
            'published_at' => $data['published_at'],
        ]);
        $authors = Author::query()->whereIn('id', $data['authors'])->get();
        $book->authors()->sync($authors);

        return BookResource::make($book);
    }

    public function destroy(Book $book)
    {
        $book->authors()->detach();
        $book->loans()->delete();
        $book->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
