@extends('layouts.app')

@section('title', 'About Me - Chamikara Bandara')

@section('content')

<section class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-12 sm:pb-16 md:pb-20 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <h2 class="section-title fade-in-up mb-8 sm:mb-12 md:mb-16">
            <span>About</span> <span>Me</span>
        </h2>
        
        <div class="max-w-5xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-8 md:gap-10 lg:gap-12 items-start mb-10 sm:mb-12 md:mb-16">
                <div class="fade-in-up order-1 lg:order-2">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl sm:rounded-3xl blur-2xl opacity-30"></div>
                        <img src="{{ asset('chamikara_bandara.PNG') }}" alt="Chamikara Bandara" 
                             class="relative w-full h-auto rounded-2xl sm:rounded-3xl object-cover shadow-2xl">
                    </div>
                </div>
                
                <div class="fade-in-up order-2 lg:order-1">
                    <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8">
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-4 sm:mb-6">Hello! I'm <span class="gradient-text">Chamikara Bandara</span></h3>
                        <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-3 sm:mb-4" style="text-align: justify;">
                            A passionate and dedicated <span class="gradient-text font-semibold">Software Developer</span> from Sri Lanka 
                            with a deep love for technology. Currently, I'm pursuing my degree in <span class="text-white font-semibold">Information Technology</span> at 
                            <span class="text-white font-semibold">SLIIT</span>, where I'm enhancing my skills in software engineering and full-stack development.
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-6 sm:space-y-8">
                <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 fade-in-up">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">
                        <i class="fas fa-code gradient-text mr-2 sm:mr-3"></i>My Journey
                    </h3>
                    <p class="text-gray-300 text-lg leading-relaxed mb-4" style="text-align: justify;">
                        I have been developing websites and applications for over <span class="gradient-text font-semibold">six years</span>. My journey started with 
                        <span class="text-white font-semibold">WordPress</span> development and has grown through <span class="text-white font-semibold">university projects</span> and real-world client work, 
                        where I’ve built full-stack solutions with <span class="text-white font-semibold">Laravel</span>, <span class="text-white font-semibold">React</span>, <span class="text-white font-semibold">Node.js</span>, and 
                        <span class="text-white font-semibold">MongoDB</span>. Recently, I’ve also expanded into <span class="text-white font-semibold">mobile app development with Flutter</span>, bringing my web experience into 
                        cross‑platform apps. I’m particularly enthusiastic about creating efficient, scalable, and user-friendly digital experiences.
                    </p>
                </div>

                <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 fade-in-up">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">
                        <i class="fas fa-palette gradient-text mr-2 sm:mr-3"></i>Creative Skills
                    </h3>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed" style="text-align: justify;">
                        In addition to my technical skills, I have a strong background in <span class="gradient-text font-semibold">graphic design</span>, and I enjoy using my creative 
                        abilities to build visually appealing interfaces. I am also constantly learning new tools and frameworks to stay ahead in this ever-evolving field.
                    </p>
                </div>

                <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 fade-in-up">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">
                        <i class="fas fa-heart gradient-text mr-2 sm:mr-3"></i>Beyond Code
                    </h3>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-3 sm:mb-4" style="text-align: justify;">
                        In my free time, I love experimenting with new technologies, working on personal projects, and contributing to open-source projects. When I'm not coding, 
                        you can find me enjoying a good book or practicing video editing.
                    </p>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed" style="text-align: justify;">
                        Feel free to reach out to me for collaborations, freelance projects, or just to talk about tech and development!
                    </p>
                </div>
            </div>

            <div class="mt-8 sm:mt-10 md:mt-12 text-center">
                <a href="/contact" class="btn-primary inline-block">Get In Touch</a>
            </div>
        </div>
    </div>
</section>

<script>
    // Fade in animation on scroll
    const fadeElements = document.querySelectorAll('.fade-in-up');
    const fadeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                fadeObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    fadeElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
        fadeObserver.observe(el);
    });
</script>

@endsection
