@extends('layouts.app')

@section('content')
<div class="about-me-container bg-black text-white py-16 px-8">
<h2 class="text-3xl font-bold mt-10 text-center">
            <span class="border-b-4 border-yellow-400">About</span>
            <span class="text-yellow-400">Me</span>
        </h2>
    <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between">

        <div class="lg:w-2/3 mt-20">

            <p class="mb-4 text-lg">
                Hello! I'm <span class="font-bold text-yellow-500">Chamikara Bandara</span>, a passionate and dedicated Software Developer from Sri Lanka 
                with a deep love for technology. Currently, I'm pursuing my degree in <span class="font-bold">Information Technology</span> at 
                <span class="font-bold">SLIIT</span>, where I'm enhancing my skills in software engineering and full-stack development.
            </p>

            <p class="mb-4 text-lg">
                I have been developing websites and working with various programming languages for over three years. My journey started with 
                <span class="font-bold">WordPress</span> development, and now I specialize in modern web technologies like 
                <span class="font-bold">Laravel</span>, <span class="font-bold">React</span>, <span class="font-bold">Node.js</span>, and 
                <span class="font-bold">MongoDB</span>. I'm particularly enthusiastic about building efficient, scalable, and user-friendly web applications.
            </p>

            <p class="mb-4 text-lg">
                In addition to my technical skills, I have a strong background in <span class="font-bold">graphic design</span>, and I enjoy using my creative 
                abilities to build visually appealing interfaces. I am also constantly learning new tools and frameworks to stay ahead in this ever-evolving field.
            </p>

            <p class="mb-4 text-lg">
                In my free time, I love experimenting with new technologies, working on personal projects, and contributing to open-source projects. When I’m not coding, 
                you can find me enjoying a good book or practicing video editing.
            </p>

            <p class="text-lg">
                Feel free to reach out to me for collaborations, freelance projects, or just to talk about tech and development!
            </p>
        </div>

        <div class="lg:w-1/3 mt-8 lg:mt-0 flex justify-center">
            <img src="{{ asset('chamikara_bandara.png') }}" alt="Chamikara Bandara" class="rounded-lg shadow-lg w-72 h-auto border-4 border-yellow-500">
        </div>

    </div>
</div>
@endsection