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
                            I’m a <span class="gradient-text font-semibold">full-stack developer</span> from Sri Lanka who cares about building software
                            that feels calm to use and solid under the hood. I recently graduated with a
                            <span class="text-white font-semibold">BSc (Hons) in Information Technology specialized in Information Technology,</span> from
                            <span class="text-white font-semibold">SLIIT</span> — and now work as a Junior Software Engineer at
                            <span class="text-white font-semibold">X4 Digital</span>, shipping production systems with
                            <span class="text-white font-semibold">Next.js</span>, <span class="text-white font-semibold">NestJS</span>, and
                            <span class="text-white font-semibold">PostgreSQL</span>.
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
                        I’ve been building for the web for over <span class="gradient-text font-semibold">six years</span> — starting with
                        <span class="text-white font-semibold">WordPress</span> and freelance client work, then growing through university projects, agency roles, and
                        infrastructure work managing servers and deployments. That mix of development and ops shaped how I think about software today.
                    </p>
                    <p class="text-gray-300 text-lg leading-relaxed" style="text-align: justify;">
                        My current stack centers on <span class="text-white font-semibold">Next.js</span> and <span class="text-white font-semibold">React</span> on the frontend,
                        <span class="text-white font-semibold">NestJS</span> and <span class="text-white font-semibold">Laravel</span> on the backend, and
                        <span class="text-white font-semibold">PostgreSQL</span> for data — with <span class="text-white font-semibold">VPS</span> hosting and deployment
                        as part of the day-to-day workflow. I enjoy taking features from idea to production and making sure they stay fast, reliable, and easy to maintain.
                    </p>
                </div>

                <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 fade-in-up">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">
                        <i class="fas fa-palette gradient-text mr-2 sm:mr-3"></i>Creative Skills
                    </h3>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed" style="text-align: justify;">
                        Alongside development, I bring a <span class="gradient-text font-semibold">design background</span> in graphic design and video editing.
                        That helps me think about layout, typography, and visual hierarchy when building interfaces — not just how something works,
                        but how it should feel. I like bridging design intent and implementation so the final product looks as good as it functions.
                    </p>
                </div>

                <div class="glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 fade-in-up">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">
                        <i class="fas fa-heart gradient-text mr-2 sm:mr-3"></i>Beyond Code
                    </h3>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-3 sm:mb-4" style="text-align: justify;">
                        When I’m not shipping code, I’m usually tinkering with side projects, exploring new tools, or refining something I’ve already built.
                        I also enjoy reading, video editing, and staying curious about how other teams solve hard engineering problems.
                    </p>
                    <p class="text-gray-300 text-base sm:text-lg leading-relaxed" style="text-align: justify;">
                        I’m open to freelance work, collaborations, and conversations about full-stack development, DevOps, or product design —
                        feel free to <a href="/contact" class="text-purple-400 hover:text-purple-300 transition-colors">get in touch</a>.
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
