<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends CsvSeeder
{
    public function __construct() {
        $this->file = '/database/seeds/csvs/books.csv';
        $this->delimiter = ',';
        $this->tablename = 'books';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::disabledQueryLog();
        parent::run();
        $books = Book::all();
        foreach($books as $book) {
            $book->update([
                'quantity' => mt_rand(1, 20),
            ]);
        }
        // \App\Models\Book::factory(211)->create();
    }
}
