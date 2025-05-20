@extends('layouts.admin-projects-layout')

@section('titolo')
    Tutti i progetti
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <h1 class="index-title">Tutti i progetti</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-secondary mb-2 mt-4 ms-3">Crea nuovo progetto</a>
        <div class="mt-3 row row-cols-3 mb-5">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="my-card">
                        <a href="{{ route("projects.show", $project->id) }}"><h4 class="mb-3">{{ $project->title }}</h4></a>
                        <p class="mb-2"><strong>Cliente: </strong>{{ $project->client }}</p>
                        <p class="mb-2"><strong>Tempo di svluppo: </strong>{{ $project->period }} settimane</p>
                        <p><strong>Descrizione del progetto:</strong></p>
                        <p>{{ $project->summary }}</p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
