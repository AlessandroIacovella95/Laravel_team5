<?php

namespace Database\Seeders;

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
        for($i = 0; $i < 5; $i++){
            $book = new Book();
          
            $book->title = $faker->words(5, true); 
            $book->author = $faker->firstNameMale() . " " . $faker->lastName();
            $book->genre = $faker->words(2, true);
            $book->publication_year = $faker->year();
            $book->price = $faker->randomFloat(1, 10, 50);
            $book->abstract = $faker->paragraph(3); 
           
            $book->save();
        }
    }
}