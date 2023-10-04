<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loan\StoreRequest;
use App\Http\Requests\Loan\UpdateRequest;
use App\Http\Resources\Loan\LoanResource;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();

        return LoanResource::collection($loans);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $book = Book::query()->findOrFail($data['book_id']);
        if (!$book->isAvailableForLoan()) {

            return response()->json(['message' => 'The book is not available for loan.'], 422);
        }

        $loan = Loan::query()->create([
            'book_id'   => $book->id,
            'reader_id' => $data['reader_id'],
            'loan_date' => now(),
        ]);

        return response()->json(['message' => 'Book loaned successfully.', 'loan_id' => $loan->id]);
    }

    public function show(Loan $loan)
    {
        //
    }

    public function update(UpdateRequest $request, Loan $loan)
    {
        //
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
