@extends('layouts.admin-projects-layout')

@section('titolo')
    Modifica Progetto Codice: {{ $project->id }}
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <h1 class="index-title">Modifica Progetto Codice: {{ $project->id }}</h1>
        <form class="mt-3 new-proj-form mb-5" action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data"> @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" required
                    value="{{ $project->title }}">
            </div>
            <div class="mb-3">
                <label for="client" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="client" name="client" required
                    value="{{ $project->client }}">
            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Tipologia</label>
                <select class="form-select" id="type_id" name="type_id" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $project->type->id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tecnologie</label>
                <div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="technology_{{ $technology->id }}"
                                name="technologies[]" value="{{ $technology->id }}"
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                            <label class="form-check-label"
                                for="technology_{{ $technology->id }}">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                @if ($project->image)
                    <div class="mb-2 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Immagine progetto" class="img-thumbnail me-3" style="max-width: 200px;">
                        <div class="d-flex flex-column flex-md-row gap-2">
                            <div class="d-flex flex-column gap-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="image_action" id="Mantieni" value="Mantieni" checked>
                                    <label class="form-check-label" for="mantieni">Mantieni</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="image_action" id="Elimina" value="Elimina">
                                    <label class="form-check-label" for="elimina">Elimina</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="image_action" id="Aggiorna" value="Aggiorna">
                                    <label class="form-check-label" for="modifica">Modifica</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="period" class="form-label">Tempo impiegato (in settimane)</label>
                <input type="number" class="form-control" id="period" name="period" required
                    value="{{ $project->period }}">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Descrizione</label>
                <textarea class="form-control" id="summary" name="summary" rows="4" required> {{ $project->summary }} </textarea>
            </div>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>

    </div>
@endsection
