<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

class FilmController extends Controller
{
    // Lista dei film
    public function index()
    {
        $films = Film::with('genre')->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    // Form per creare un film
    public function create()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    // Salva un nuovo film
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Film::create($request->all());
        return redirect()->route('films.index')->with('success', 'Film creato con successo.');
    }

    // Mostra i dettagli di un film
    public function show(Film $film)
    {
        return view('admin.films.show', compact('film'));
    }

    // Form per modificare un film
    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    // Aggiorna un film
    public function update(Request $request, Film $film)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
            'poster' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('posters', 'public');
        }

        $film->update($data);

        return redirect()->route('dashboard')->with('success', 'Film aggiornato!');
    }

    // Elimina un film
    public function destroy(Film $film)
    {
        // Se il poster è salvato in storage, lo eliminiamo
        if ($film->poster && str_starts_with($film->poster, 'posters/')) {

        }

        $film->delete();

        return redirect()->route('dashboard')
                         ->with('success', 'Film eliminato correttamente.');
    }
}
