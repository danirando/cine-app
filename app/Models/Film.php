<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    // Campi mass assignable
    protected $fillable = [
        'title',
        'genre_id',
        'release_date',
        'description',
        'poster',
    ];

    /**
     * Relazione con il modello Genre
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Accessor per ottenere l'URL completo del poster
     * Utile per frontend (React) o API
     */
    public function getPosterUrlAttribute()
    {
        return $this->poster ? asset('storage/' . $this->poster) : null;
    }
}
