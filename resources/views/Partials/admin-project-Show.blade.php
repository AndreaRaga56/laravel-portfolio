@extends('layouts.admin-projects-layout')

@section('titolo')
    Progetto {{ $project->title }}
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <div class="show-card">
            <h1 > <strong>Progetto {{ $project->title }} </strong></h1>
            <div class="mt-4">
                <h4 class="mb-3"><strong>Codice Progetto: </strong>{{ $project->id }}</h4>
                <p class="mb-3"><strong>Cliente: </strong>{{ $project->client }}</p>
                <p class="mb-3"><strong>Tempo di svluppo: </strong>{{ $project->period }} settimane</p>
                <p><strong>Descrizione del progetto:</strong></p>
                <p>{{ $project->summary }}</p>
                <p class="mt-4"><a href="{{ route('projects.index') }}">Torna ai Progetti</a></p>

            </div>
        </div>
    </div>
@endsection
