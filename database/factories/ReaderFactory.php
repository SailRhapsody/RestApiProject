<?php

namespace Database\Factories;

use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReaderFactory extends Factory
{
    protected $model = Reader::class;
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'address' => fake()->address,
            'contact_number' => fake()->phoneNumber
        ];
    }
}
