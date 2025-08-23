@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Dettagli Film</h2>

    <div class="card shadow-sm p-4 mb-3">
        <!-- Locandina -->
        @if($film->poster)
<img src="{{ $film->poster }}" alt="{{ $film->title }}" class="img-fluid">
        @endif

        <!-- Titolo -->
        <h4 class="mb-3">{{ $film->title }}</h4>

        <!-- Genere -->
        <p><strong>Genere:</strong> {{ $film->genre->name ?? '-' }}</p>

        <!-- Data di uscita -->
        <p><strong>Data di uscita:</strong> {{ $film->release_date ?? '-' }}</p>

        <!-- Descrizione -->
        <p><strong>Descrizione:</strong></p>
        <p>{{ $film->description ?? '-' }}</p>
    </div>

    <!-- Bottoni -->
    <div class="d-flex justify-content-between flex-wrap">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-2">Torna alla Dashboard</a>
        <div>
            <a href="{{ route('films.edit', $film) }}" class="btn btn-warning mb-2 me-1">Modifica</a>
            <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline mb-2" onsubmit="return confirm('Sei sicuro di voler eliminare questo film?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Elimina</button>
            </form>
        </div>
    </div>
</div>
@endsection
