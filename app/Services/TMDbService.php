<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDbService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
        $this->baseUrl = config('services.tmdb.base_url');
    }

    public function getGenres()
    {
        $response = Http::get("{$this->baseUrl}/genre/movie/list", [
            'api_key' => $this->apiKey,
            'language' => 'it-IT',
        ]);

        return $response->json()['genres'];
    }

    public function getPopularMovies($page = 1)
    {
        $response = Http::get("{$this->baseUrl}/movie/popular", [
            'api_key' => $this->apiKey,
            'language' => 'it-IT',
            'page' => $page,
        ]);

        return $response->json()['results'];
    }

    public function getMovieDetails($movieId)
    {
        $response = Http::get("{$this->baseUrl}/movie/{$movieId}", [
            'api_key' => $this->apiKey,
            'language' => 'it-IT',
        ]);

        return $response->json();
    }
}
