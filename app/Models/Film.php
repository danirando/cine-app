<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'genre_id',
    'release_date',
    'description',
    'poster', // aggiunto
];


    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
