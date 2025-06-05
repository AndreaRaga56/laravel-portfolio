@extends('layouts.admin-projects-layout')

@section('titolo')
    Progetto {{ $project->title }}
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <div class="show-card">
            <h1> <strong>Progetto: {{ $project->title }} </strong></h1>
            <div class="row row-col">
                <div class="col-4 mt-4">
                    <h4 class="mb-3"><strong>Codice Progetto: </strong>{{ $project->id }}</h4>
                    <p class="mb-3"><strong>Cliente: </strong>{{ $project->client }}</p>
                    <p class="mb-3"><strong>Tipologia: </strong>{{ $project->type->name }}</p>
                    @if (count($project->technologies) > 0)
                        <p class="mb-3"><strong>Tecnologia: </strong>
                            @foreach ($project->technologies as $technology)
                                <span class="badge"
                                    style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                            @endforeach
                        </p>
                    @endif
                    <p class="mb-3"><strong>Tempo di svluppo: </strong>{{ $project->period }} settimane</p>
                    <p><strong>Descrizione del progetto:</strong></p>
                    <p>{{ $project->summary }}</p>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Elimina</button>
                    </div>
                    <p class="mt-3"><a href="{{ route('projects.index') }}">Torna ai Progetti</a></p>
                </div>
                @if ($project->image)
                    <div class="col-8 mt-4">
                        <div>
                            <img class='show-project-img' src="{{ asset('storage/' . $project->image) }}"
                                alt="Immagine progetto">
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Elimina Progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il progetto definitivamente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina definitivamente</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
