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
<img src="{{ $film->poster }}" alt="{{ $film->title }}" class="img-fluid">
                        @endif
                    </td>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->genre->name ?? '-' }}</td>
                    <td>{{ $film->release_date ?? '-' }}</td>
                    <td class="text-center">
                        <a href="{{ route('films.show', $film) }}" class="btn btn-info btn-sm me-1 mb-1">Dettagli</a>
                        <a href="{{ route('films.edit', $film) }}" class="btn btn-warning btn-sm me-1 mb-1">Modifica</a>
                        <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline mb-1" onsubmit="return confirm('Sei sicuro di voler eliminare questo film?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Elimina</button>
                        </form>
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
