<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FilmController extends Controller
{
    /**
     * Lista di tutti i film
     */
    public function index()
    {
        // Restituisci direttamente la colonna poster senza manipolazioni
        $films = Film::with('genre')->get();

        return response()->json($films);
    }

    /**
     * Dettagli di un singolo film
     */
    public function show(Film $film)
    {
        $film->load('genre');

        return response()->json($film);
    }

    /**
     * Creazione di un nuovo film
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'poster' => 'nullable|string', // può essere URL esterno o percorso locale
            'genre_id' => ['required', Rule::exists('genres', 'id')],
            'release_date' => 'nullable|date',
        ]);

        $film = Film::create($data);

        return response()->json($film, 201);
    }

    /**
     * Aggiornamento di un film
     */
    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'poster' => 'sometimes|nullable|string',
            'genre_id' => ['sometimes','required', Rule::exists('genres', 'id')],
            'release_date' => 'sometimes|nullable|date',
        ]);

        $film->update($data);

        return response()->json($film);
    }

    /**
     * Eliminazione di un film
     */
    public function destroy(Film $film)
    {
        $film->delete();

        return response()->json(['message' => 'Film eliminato']);
    }
}
