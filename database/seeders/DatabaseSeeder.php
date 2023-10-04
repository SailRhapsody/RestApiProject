<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Models\Book;
use App\Models\Muser;
use App\Models\Order;
use App\Models\Question;
use App\Models\Reader;
use Database\Factories\BookFactory;
use Database\Factories\ReaderFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Reader::factory()->count(100)->create();
        Book::factory()->count(50)->create();
        Author::factory()->count(20)->create();
        AuthorBook::factory()->count(100)->create();
    }
}
