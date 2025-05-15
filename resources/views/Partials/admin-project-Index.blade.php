@extends('layouts.admin-projects-layout')

@section('titolo')
    Tutti i progetti
@endsection

@section('contenuto1')
    <div class="mt-4 container">
        <h1>Tutti i progetti</h1>
        <div class="mt-3 row row-cols-3 mb-5">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="my-card">
                        <h4 class="mb-3">{{ $project->title }}</h4>
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
