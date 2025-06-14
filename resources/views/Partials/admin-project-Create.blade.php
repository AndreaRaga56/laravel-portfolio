@extends('layouts.admin-projects-layout')

@section('titolo')
    Crea Nuovo Progetto
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <h1 class="index-title">Crea Nuovo Progetto</h1>
        <form class="mt-3 new-proj-form mb-5" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"> @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="client" name="client" required>
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia</label>
                <select class="form-select" id="type_id" name="type_id" required>
                    <option value="" disabled selected>Seleziona una tipologia</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="mb-3">
                <label class="form-label">Tecnologie</label>
                <div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="technology_{{ $technology->id }}"
                                name="technologies[]" value="{{ $technology->id }}">
                            <label class="form-check-label"
                                for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="period" class="form-label">Tempo impiegato (in settimane)</label>
                <input type="number" class="form-control" id="period" name="period" required>
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Descrizione</label>
                <textarea class="form-control" id="summary" name="summary" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Crea Progetto</button>
        </form>
    </div>
@endsection
