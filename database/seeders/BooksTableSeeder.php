<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dodanie książek przy użyciu modelu Book
        Book::create([
            'name' => 'Hobbit',
            'year' => '2001',
            'publication_place' => 'Warszawa',
            'pages' => '310',
            'price' => '29.99',
        ]);

        Book::create([
            'name' => 'Kolor magii',
            'year' => '2005',
            'publication_place' => 'Katowice',
            'pages' => '205',
            'price' => '24.99',
        ]);

        Book::create([
            'name' => 'Władca Pierścieni',
            'year' => '2000',
            'publication_place' => 'Kraków',
            'pages' => '645',
            'price' => '59.99',
        ]);
    }
}
