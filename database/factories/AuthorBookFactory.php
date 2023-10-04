<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuthorBook>
 */
class AuthorBookFactory extends Factory
{
    protected $model = AuthorBook::class;

    public function definition(): array
    {
        return [
            'author_id' => function () {
                return Author::factory()->create()->id;
            },
            'book_id' => function () {
                return Book::factory()->create()->id;
            },
        ];
    }
}
