<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Book::truncate();

        $books = [
            [
                'name' => 'Book',
                'author' => 'Humayun Ahmed',
                'thumbnail' => 'https://ds.rokomari.store/rokomari110/ProductNew20190903/130X186/198bdd3d6_1167.jpg',
                'oldPrice' => '300',
                'newPrice' => '200'
            ],
            [
                'name' => 'krishno pokkho',
                'author' => 'Humayun Ahmed',
                'thumbnail' => 'https://ds.rokomari.store/rokomari110/ProductNew20190903/130X186/68cb707d2_1354.jpg',
                'oldPrice' => '400',
                'newPrice' => '200'
            ]
        ];

      
        Book::create($books);
    }
}
