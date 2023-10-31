<?php

namespace App\Http\Controllers;

use App\Http\Resources\Author\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::indexAuthors();

        return AuthorResource::collection($authors);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Author $author)
    {
        return AuthorResource::make($author);
    }

    public function update(Request $request, Author $author)
    {
        //
    }

    public function destroy(Author $author)
    {
        //
    }
}
