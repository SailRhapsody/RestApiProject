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
    public function isAvailableForLoan()
    {
        return !$this->loans()->exists();
    }
}
