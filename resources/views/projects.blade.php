@extends('layouts.app')

@section('content')
<div class="projects-page-container bg-black text-white py-16 px-8">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-yellow-500 mb-8 text-center">My Projects</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 1</h2>
                <p class="mb-4">
                    Brief description of Project 1. This project involved developing a web application using Laravel, React, and MongoDB.
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>

            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 2</h2>
                <p class="mb-4">
                    Brief description of Project 2. This project involved building a WordPress website with custom plugins and themes.
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>

            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 3</h2>
                <p class="mb-4">
                    Brief description of Project 3. This project was a full-stack application with a focus on user authentication and real-time updates.
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>

        </div>
    </div>
</div>
@endsection