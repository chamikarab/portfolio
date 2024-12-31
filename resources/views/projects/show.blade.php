@extends('layouts.app')

@section('content')
<div class="project-details-page bg-black text-white py-16 px-8">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-yellow-500 mb-8 text-center">{{ $project->name }}</h1>
        
        <div class="project-details bg-gray-800 p-6 rounded-lg shadow-lg">
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="mb-8 rounded-lg shadow-lg">
            <p class="text-lg mb-8">{{ $project->description }}</p>
            <a href="{{ route('projects.index') }}" class="text-yellow-500 hover:text-yellow-300 font-bold">Back to Projects</a>
        </div>
    </div>
</div>
@endsection