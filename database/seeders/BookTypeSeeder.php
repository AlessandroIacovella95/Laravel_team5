<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Type;
use App\Models\Book;


class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $books = Book::all();
        $types = Type::all()->pluck('id')->toArray();

        foreach ($books as $book) {
            $book
                ->types()
                ->attach($faker->randomElements($types, random_int(0, 3)));
        }
    }
}
