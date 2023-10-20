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
        $loans = Loan::indexLoans();

        return LoanResource::collection($loans);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        return Loan::storeLoan($data);
    }

    public function show(Loan $loan)
    {
        return LoanResource::make($loan);
    }

    public function update(UpdateRequest $request, Loan $loan)
    {
    }

    public function destroy(Loan $loan)
    {
        $loan->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
