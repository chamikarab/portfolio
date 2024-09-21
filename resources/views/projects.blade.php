

@extends('layouts.app')

@section('content')
<div class="projects-page-container bg-black text-white py-16 px-8">
    <div class="container mx-auto">
        <h1 class="text-4xl font-bold text-yellow-500 mb-8 text-center">My Projects</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 1</h2>
                <p class="mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit enim debitis error minus exercitationem ipsa saepe praesentium deserunt? Blanditiis hic dolor, culpa debitis pariatur ab repellat cum a deleniti cumque?
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>


            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 2</h2>
                <p class="mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit enim debitis error minus exercitationem ipsa saepe praesentium deserunt? Blanditiis hic dolor, culpa debitis pariatur ab repellat cum a deleniti cumque?
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>

            <div class="project-card bg-gray-800 p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold text-yellow-500 mb-4">Project Title 3</h2>
                <p class="mb-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit enim debitis error minus exercitationem ipsa saepe praesentium deserunt? Blanditiis hic dolor, culpa debitis pariatur ab repellat cum a deleniti cumque?
                </p>
                <a href="#" class="text-yellow-500 hover:text-yellow-300 font-bold">View Project</a>
            </div>

        </div>
    </div>
</div>
@endsection