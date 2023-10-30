<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Generator as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $genres = Genre::all()->pluck('id')->toArray();
        $genres[] = null;

        for ($i = 0; $i < 25; $i++) {
            $genre_id = $faker->randomElement($genres);

            $book = new Book();

            $book->genre_id = $genre_id;
            $book->title = $faker->words(5, true);
            $book->author = $faker->firstNameMale() . " " . $faker->lastName();

            $book->publication_year = $faker->year();
            $book->price = $faker->randomFloat(1, 10, 50);
            $book->abstract = $faker->paragraph(3);

            $book->save();
        }
    }
}