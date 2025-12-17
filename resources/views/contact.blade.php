@extends('layouts.app')

@section('title', 'Contact Me - Chamikara Bandara')

@section('content')

<section id="contact" class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-12 sm:pb-16 md:pb-20 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <h2 class="section-title fade-in-up mb-8 sm:mb-12 md:mb-16">
            <span>Contact</span> <span>Me</span>
        </h2>

        <!-- Contact Details -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-10 sm:mb-12 md:mb-16 max-w-6xl mx-auto">
            <!-- Phone Number -->
            <div class="contact-item-modern fade-in-up">
                <i class="fas fa-phone-alt text-3xl sm:text-4xl"></i>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 text-white mt-4">Phone Number</h3>
                <p class="text-gray-300 text-base sm:text-lg">+94 779 404 553</p>
            </div>

            <!-- Email -->
            <div class="contact-item-modern fade-in-up">
                <i class="fas fa-envelope text-3xl sm:text-4xl"></i>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 text-white mt-4">Email</h3>
                <p class="text-gray-300 text-base sm:text-lg break-words">chamikara38@gmail.com</p>
            </div>

            <!-- Social Media -->
            <div class="contact-item-modern fade-in-up sm:col-span-2 lg:col-span-1">
                <i class="fas fa-share-alt text-3xl sm:text-4xl"></i>
                <h3 class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4 text-white mt-4">Social Media</h3>
                <div class="flex justify-center flex-wrap gap-3 sm:gap-4 mt-4">
                    <a href="https://facebook.com" target="_blank" 
                       class="w-11 h-11 sm:w-12 sm:h-12 rounded-full glass flex items-center justify-center text-blue-500 hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-facebook-f text-lg sm:text-xl"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" 
                       class="w-11 h-11 sm:w-12 sm:h-12 rounded-full glass flex items-center justify-center text-blue-600 hover:text-blue-400 transition-colors duration-300">
                        <i class="fab fa-linkedin-in text-lg sm:text-xl"></i>
                    </a>
                    <a href="https://github.com" target="_blank" 
                       class="w-11 h-11 sm:w-12 sm:h-12 rounded-full glass flex items-center justify-center text-white hover:text-gray-300 transition-colors duration-300">
                        <i class="fab fa-github text-lg sm:text-xl"></i>
                    </a>
                    <a href="https://whatsapp.com" target="_blank" 
                       class="w-11 h-11 sm:w-12 sm:h-12 rounded-full glass flex items-center justify-center text-green-500 hover:text-green-400 transition-colors duration-300">
                        <i class="fab fa-whatsapp text-lg sm:text-xl"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="max-w-3xl mx-auto glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 fade-in-up">
            <div class="text-center">
                <i class="fas fa-comments text-4xl sm:text-5xl gradient-text mb-4 sm:mb-6"></i>
                <h3 class="text-xl sm:text-2xl font-semibold mb-3 sm:mb-4 text-white">Let's Work Together</h3>
                <p class="text-gray-300 text-base sm:text-lg leading-relaxed mb-4 sm:mb-6">
                    Feel free to reach out via any of the above methods. I'm always open to work, collaboration, or casual conversations about technology and development!
                </p>
                <p class="text-gray-400 text-sm sm:text-base">
                    Whether you have a project in mind, want to collaborate, or just want to say hello, I'd love to hear from you.
                </p>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="max-w-2xl mx-auto mt-8 sm:mt-10 md:mt-12 text-center fade-in-up">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/projects" class="btn-secondary inline-block">View My Projects</a>
                <a href="/about" class="btn-primary inline-block">Learn More About Me</a>
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
