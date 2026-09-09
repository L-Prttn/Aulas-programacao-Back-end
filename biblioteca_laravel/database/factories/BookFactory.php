<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=> fake() -> sentence(3),
            'ano_publicacao'=> fake() -> numberBetween(1900, 2024),
            'numero_paginas'=> fake() -> numberBetween(20, 900),
            'genero'=> fake() -> randomElement(['Romance', 'Ficção', 'Terror', 'Poesia', 'Biografia']),
            'author_id' => Author::factory(),
        ];
    }
}
