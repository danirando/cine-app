<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = ['Azione', 'Commedia', 'Drammatico', 'Fantascienza', 'Animazione'];

        foreach ($genres as $name) {
            Genre::updateOrCreate(['name' => $name]);
        }
    }
}
