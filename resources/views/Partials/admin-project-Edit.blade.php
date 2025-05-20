@extends('layouts.admin-projects-layout')

@section('titolo')
    Modifica Progetto Codice: {{ $project->id }}
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <h1 class="index-title">Modifica Progetto Codice: {{ $project->id }}</h1>
        <form class="mt-3 new-proj-form mb-5" action="{{ route('projects.update', $project) }}" method="POST"> @csrf @method('PUT')
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
