@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Dettagli Film</h2>

    <div class="card shadow-sm p-4 mb-3">
        <!-- Locandina -->
         @php
        // Se il poster inizia con "http" lo usiamo così com'è
        $posterUrl = Str::startsWith($film->poster, ['http', 'https'])
            ? $film->poster
            : asset('storage/' . ltrim($film->poster, '/'));
    @endphp
     <img src="{{ $posterUrl }}" alt="{{ $film->title }}" class="img-fluid w-25">

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
    
    <div class="d-flex align-items-center">
        <a href="{{ route('films.edit', $film) }}" class="btn btn-warning mb-2 me-1">Modifica</a>

        <!-- Bottone Elimina -->
        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $film->id }}">
            Elimina
        </button>
    </div>
</div>

<!-- Modale di conferma eliminazione -->
<div class="modal fade" id="deleteModal-{{ $film->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $film->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel-{{ $film->id }}">Conferma eliminazione</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare questo film?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        
        <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
      </div>
    </div>
  </div>
</div>

</div>
@endsection
