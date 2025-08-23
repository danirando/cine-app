<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmSeeder extends Seeder
{
    public function run(): void
    {
        $films = [
            ['title' => 'Inception', 'genre_id' => 4, 'release_date' => '2010-07-16', 'poster' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/qmDpIHrmpJINaRKAfWQfftjCdyi.jpg'],
            ['title' => 'The Dark Knight', 'genre_id' => 1, 'release_date' => '2008-07-18', 'poster' => 'https://image.tmdb.org/t/p/w500/1hRoyzDtpgMU7Dz4JF22RANzQO7.jpg'],
            ['title' => 'The Godfather', 'genre_id' => 3, 'release_date' => '1972-03-24', 'poster' => 'https://image.tmdb.org/t/p/w500/rPdtLWNsZmAtoZl9PK7S2wE3qiS.jpg'],
            ['title' => 'Fight Club', 'genre_id' => 3, 'release_date' => '1999-10-15', 'poster' => 'https://image.tmdb.org/t/p/w500/bptfVGEQuv6vDTIMVCHjJ9Dz8PX.jpg'],
            ['title' => 'The Matrix', 'genre_id' => 4, 'release_date' => '1999-03-31', 'poster' => 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg'],
            ['title' => 'Forrest Gump', 'genre_id' => 3, 'release_date' => '1994-07-06', 'poster' => 'https://image.tmdb.org/t/p/w500/saHP97rTPS5eLmrLQEcANmKrsFl.jpg'],
            ['title' => 'The Shawshank Redemption', 'genre_id' => 3, 'release_date' => '1994-09-23', 'poster' => 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg'],
            ['title' => 'The Lord of the Rings: The Fellowship of the Ring', 'genre_id' => 4, 'release_date' => '2001-12-19', 'poster' => 'https://image.tmdb.org/t/p/w500/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg'],
            ['title' => 'Joker', 'genre_id' => 3, 'release_date' => '2019-10-04', 'poster' => 'https://image.tmdb.org/t/p/w500/udDclJoHjfjb8Ekgsd4FDteOkCU.jpg'],
            ['title' => 'Se7en', 'genre_id' => 1, 'release_date' => '1995-09-22', 'poster' => 'https://image.tmdb.org/t/p/w500/69Sns8WoET6CfaYlIkHbla4l7nC.jpg'],
            ['title' => 'Interstellar', 'genre_id' => 4, 'release_date' => '2014-11-07', 'poster' => 'https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg'],
            ['title' => 'Avengers: Endgame', 'genre_id' => 1, 'release_date' => '2019-04-26', 'poster' => 'https://image.tmdb.org/t/p/w500/ulzhLuWrPK07P1YkdWQLZnQh1JL.jpg'],
            ['title' => 'Titanic', 'genre_id' => 3, 'release_date' => '1997-12-19', 'poster' => 'https://image.tmdb.org/t/p/w500/kHXEpyfl6zqn8a6YuozZUujufXf.jpg'],
            ['title' => 'Gladiator', 'genre_id' => 1, 'release_date' => '2000-05-05', 'poster' => 'https://image.tmdb.org/t/p/w500/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg'],
            ['title' => 'Parasite', 'genre_id' => 3, 'release_date' => '2019-11-08', 'poster' => 'https://image.tmdb.org/t/p/w500/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'],
            ['title' => 'The Lion King', 'genre_id' => 4, 'release_date' => '1994-06-15', 'poster' => 'https://image.tmdb.org/t/p/w500/2bXbqYdUdNVa8VIWXVfclP2ICtT.jpg'],
            ['title' => 'Toy Story', 'genre_id' => 4, 'release_date' => '1995-11-22', 'poster' => 'https://image.tmdb.org/t/p/w500/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg'],
            ['title' => 'Spider-Man: No Way Home', 'genre_id' => 1, 'release_date' => '2021-12-17', 'poster' => 'https://image.tmdb.org/t/p/w500/1g0dhYtq4irTY1GPXvft6k4YLjm.jpg'],
            ['title' => 'Black Panther', 'genre_id' => 1, 'release_date' => '2018-02-16', 'poster' => 'https://image.tmdb.org/t/p/w500/uxzzxijgPIY7slzFvMotPv8wjKA.jpg'],
            ['title' => 'The Social Network', 'genre_id' => 3, 'release_date' => '2010-10-01', 'poster' => 'https://image.tmdb.org/t/p/w500/z5M2StTLxv1Ec4KqK1N2ZkqFJ2p.jpg'],
        ];

        foreach ($films as $data) {
            Film::updateOrCreate(
                ['title' => $data['title']],
                [
                    'title' => $data['title'],
                    'genre_id' => $data['genre_id'],
                    'release_date' => $data['release_date'],
                    'description' => $data['title'],
                    'poster' => $data['poster'], // salviamo direttamente l'URL
                ]
            );
        }
    }
}
