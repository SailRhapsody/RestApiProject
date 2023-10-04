<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'biography',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_book');
    }
}