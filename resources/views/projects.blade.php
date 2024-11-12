@extends('layouts.app')

@section('content')
<div class="projects-page-container bg-gray-900 text-white py-20 px-10">
    <div class="container mx-auto">
        <h1 class="text-3xl font-extrabold text-center text-yellow-400 mb-12">My Projects</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse ($projects as $project)
                <div class="project-card bg-gray-800 hover:bg-gray-700 p-8 rounded-lg shadow-lg transition duration-300 ease-in-out">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h2 class="text-1xl font-semibold text-yellow-400 mb-2">{{ $project->name }}</h2>
                    <p class="text-gray-400 mb-4">{{ Str::limit($project->description, 120) }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="inline-block text-yellow-400 hover:text-yellow-300 font-low">
                        View Project &rarr;
                    </a>
                </div>
            @empty
                <p class="text-center col-span-3 text-gray-500">No projects available to display at the moment.</p>
            @endforelse
        </div>


        @if ($projects->isEmpty())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 mt-10">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="project-card bg-gray-800 hover:bg-gray-700 p-8 rounded-lg shadow-lg transition duration-300 ease-in-out">
                        <div class="w-full h-48 bg-gray-700 rounded-lg mb-4"></div>
                        <h2 class="text-2xl font-semibold text-yellow-400 mb-2">Project Title {{ $i }}</h2>
                        <p class="text-gray-400 mb-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit enim debitis minus.
                        </p>
                        <a href="#" class="inline-block text-yellow-400 hover:text-yellow-300 font-medium">
                            View Project &rarr;
                        </a>
                    </div>
                @endfor
            </div>
        @endif
    </div>
</div>
@endsection