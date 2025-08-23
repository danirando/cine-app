@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">Nuovo Film</h2>

    <div class="card shadow-sm p-4">
        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" name="title" id="title"
                       class="form-control @error('title') is-invalid @enderror"
                       value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="genre_id" class="form-label">Genere</label>
                <select name="genre_id" id="genre_id"
                        class="form-select @error('genre_id') is-invalid @enderror" required>
                    <option value="">Seleziona un genere</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Data di uscita</label>
                <input type="date" name="release_date" id="release_date"
                       class="form-control @error('release_date') is-invalid @enderror"
                       value="{{ old('release_date') }}">
                @error('release_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" rows="4"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="poster" class="form-label">Locandina</label>
                <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror">
                @error('poster')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Annulla</a>
                <button type="submit" class="btn btn-success">Salva Film</button>
            </div>
        </form>
    </div>
</div>
@endsection
