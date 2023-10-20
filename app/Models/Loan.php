<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'reader_id',
        'book_id',
        'date_issued',
        'due_date',
        'returned_at',
    ];

    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public static function indexLoans()
    {
        $loans = Loan::query()->paginate(20);
        $loans->appends(request()->query());

        return $loans;
    }

    public static function storeLoan(array $data)
    {
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
}
