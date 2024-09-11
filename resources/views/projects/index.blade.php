@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold">My Projects</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($projects as $project)
            <div class="border p-4">
                <h3 class="font-bold">{{ $project->title }}</h3>
                <p>{{ $project->description }}</p>
                <a href="{{ $project->link }}" class="text-blue-500">View Project</a>
            </div>
        @endforeach
    </div>
@endsection