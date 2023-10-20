<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'published_at',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_books');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function isAvailableForLoan(): bool
    {
        return !$this->loans()->exists();
    }

    public static function indexBooks(){
        $books = Book::query()->paginate(20);
        $books->appends(request()->query());

        return $books;
    }

    public static function storeBook(array $data)
    {
        $book    = Book::query()->create([
            'title'        => $data['title'],
            'description'  => $data['description'],
            'published_at' => $data['published_at'],
        ]);
        $authors = Author::query()->whereIn('id', $data['authors'])->get();
        $book->authors()->attach($authors);

        return $book;
    }

    public static function updateBook(Book $book, array $data)
    {
        $book->update([
            'title'        => $data['title'],
            'description'  => $data['description'],
            'published_at' => $data['published_at'],
        ]);
        $authors = Author::query()->whereIn('id', $data['authors'])->get();
        $book->authors()->sync($authors);

        return $book;
    }

    public static function destroyBook(Book $book): void
    {
        $book->authors()->detach();
        $book->loans()->delete();
        $book->delete();
    }
}
