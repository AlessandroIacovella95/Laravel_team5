<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = ["Romanzo", "Fantascienza", "Fantasy", "Giallo", "Biografia", "Thriller", "Saggistica", "Poesia"];

        foreach ($labels as $label) {
            $genre = new Genre();
            $genre->label = $label;

            $genre->save();
        }
    }
}