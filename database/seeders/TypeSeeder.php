<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $labels = ["Copertina flessibile ", "Ebook", "Audiolibro", "Copertina rigida"];

        foreach ($labels as $label) {
            $type = new Type();
            $type->label = $label;

            $type->save();
        }
    }
}
