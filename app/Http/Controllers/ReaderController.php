<?php

namespace App\Http\Controllers;

use App\Http\Resources\Reader\ReaderResource;
use App\Models\Reader;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Reader $reader)
    {
        return ReaderResource::make($reader);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
