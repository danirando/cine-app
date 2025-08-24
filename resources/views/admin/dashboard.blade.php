@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Dashboard - Film</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('films.create') }}" class="btn btn-primary">Nuovo Film</a>
        <small class="text-muted">Totale film: {{ $films->total() }}</small>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Locandina</th>
                    <th>Titolo</th>
                    <th>Genere</th>
                    <th>Data di uscita</th>
                    <th class="text-center">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr>
                    <td>
                      @if($film->poster)
    @php
        // Se il poster inizia con "http" lo usiamo così com'è
        $posterUrl = Str::startsWith($film->poster, ['http', 'https'])
            ? $film->poster
            : asset('storage/' . ltrim($film->poster, '/'));
    @endphp

    <img src="{{ $posterUrl }}" alt="{{ $film->title }}" class="img-fluid" style="max-height:100px;">
@endif


                    </td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre->name ?? '-' }}</td>
                    <td>{{ $film->release_date ?? '-' }}</td>
                    <td class="align-middle">
   <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
    <a href="{{ route('films.show', $film) }}" 
       class="btn btn-info btn-sm flex-fill text-center">
       Dettagli
    </a>
    <a href="{{ route('films.edit', $film) }}" 
       class="btn btn-warning btn-sm flex-fill text-center">
       Modifica
    </a>

    <!-- Bottone Elimina -->
    <button type="button" class="btn btn-danger btn-sm flex-fill" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $film->id }}">
        Elimina
    </button>
</div>

<!-- Modale di conferma -->
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

</td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $films->onEachSide(1)->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
