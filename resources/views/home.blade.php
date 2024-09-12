@extends('layouts.app')

@section('title', 'Chamikara Bandara - Portfolio')

@section('content')

<!-- Hero -->
<section id="hero" class="bg-cover bg-center h-screen" style="background-image: url('/hero-image.jpg');">
    <div class="container mx-auto flex items-center justify-start h-full">
        <div class="text-left">
            <h1 class="text-white text-3xl mb-4">HELLO, I'M</h1>
            <h2 class="text-white text-5xl font-bold mb-4">CHAMIKARA BANDARA</h2>
            <h3 class="text-white text-4xl font-bold mb-8 ">I'M <span class="typed-text" id="typed-text"></span></h3>
            <a href="#contact" class="border border-red-600 text-red-700 hover:bg-red-700 hover:text-white py-3 px-6 rounded-lg transition-colors duration-300 font-bold">Contact Me</a>

        </div>
    </div>
</section>

<!-- About -->
<section id="about" class="py-20">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="border-b-4 border-yellow-400">About</span>
            <span class="text-yellow-400">Me</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="flex justify-end">
                <img src="/chamikara_bandara.png" alt="Chamikara Bandara" class="w-3/5 h-auto object-cover rounded-lg mb-4">
            </div>
            <div class="pr-20">
                <p class="mb-4">I'm a full-stack web developer with over 5 years of experience in building websites and web applications. I specialize in modern technologies like Laravel, Vue.js, and Tailwind CSS.</p>
                <p class="mb-4">I'm passionate about creating beautiful and user-friendly interfaces that provide a seamless user experience. I'm always eager to learn new technologies and improve my skills.</p>
                <p class="mb-4">I'm currently available for freelance work. If you have a project in mind or need a website, feel free to get in touch with me.</p>
                <p class="mb-4">I'm a full-stack web developer with over 5 years of experience in building websites and web applications. I specialize in modern technologies like Laravel, Vue.js, and Tailwind CSS.</p>
                <p class="mb-4">I'm passionate about creating beautiful and user-friendly interfaces that provide a seamless user experience. I'm always eager to learn new technologies and improve my skills.</p>
                <p class="mb-4">I'm currently available for freelance work. If you have a project in mind or need a website, feel free to get in touch with me.</p>
            </div>
        </div>
    </div>
</section>





<!-- Services -->
<section id="services" class="py-20">
    <div class="container mx-auto">
    <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">My</span>
            <span class="border-b-4 border-yellow-400">Services</span>
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="border border-white hover:border-yellow-400 p-6 rounded-lg shadow-lg text-center transition-all duration-300 ease-in-out">
                <i class="fas fa-code text-4xl text-blue-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Web Development</h3>
                <p>Building responsive and dynamic websites with modern technologies.</p>
            </div>
            <div class="border border-white hover:border-yellow-400 p-6 rounded-lg shadow-lg text-center transition-all duration-300 ease-in-out">
                <i class="fas fa-paint-brush text-4xl text-blue-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">UI/UX Design</h3>
                <p>Designing user-friendly interfaces and experiences.</p>
            </div>
            <div class="border border-white hover:border-yellow-400 p-6 rounded-lg shadow-lg text-center transition-all duration-300 ease-in-out">
                <i class="fas fa-server text-4xl text-blue-500 mb-4"></i>
                <h3 class="text-xl font-semibold mb-2">Backend Development</h3>
                <p>Creating scalable backend systems with robust APIs.</p>
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-20">
    <div class="container mx-auto">
    <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">My</span>
            <span class="border-b-4 border-yellow-400">Projects</span>
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="/product-image.jpg" alt="Project 1" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold mb-2">Project 1</h3>
                <p>A brief description of the project.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="/product-image.jpg" alt="Project 2" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold mb-2">Project 2</h3>
                <p>A brief description of the project.</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="/product-image.jpg" alt="Project 2" class="w-full h-48 object-cover mb-4 rounded-lg">
                <h3 class="text-xl font-semibold mb-2">Project 3</h3>
                <p>A brief description of the project.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-20 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-6 text-center">Get in Touch </h2>
        <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-semibold mb-2">Message</label>
                <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-lg" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Send Message</button>
            </div>
        </form>
    </div>
</section>

<script>
    var typed = new Typed('#typed-text', {
        strings: ["PROGRAMMER", "CODER", "GRAPHIC DESIGNER", "VIDEO EDITOR", "WEB DEVELOPER"],
        typeSpeed: 50, 
        backSpeed: 50,
        loop: true, 
        backDelay: 2000 
    });
</script>


@endsection
