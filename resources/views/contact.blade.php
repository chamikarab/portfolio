@extends('layouts.app')

@section('title', 'Contact Me - Chamikara Bandara')

@section('content')

<section id="contact" class="pt-20 sm:pt-24 md:pt-28 lg:pt-32 pb-16 sm:pb-20 md:pb-24 min-h-screen">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-8 sm:mb-10 md:mb-14 fade-in-up">
                <h2 class="section-title mb-3 sm:mb-4 md:mb-5">
                    <span>Contact</span> <span>Me</span>
                </h2>
                <p class="max-w-2xl mx-auto text-sm sm:text-base text-slate-300">
                    Pick the way that’s easiest for you — a quick call, a DM, or an email with all the details.
                </p>
            </div>

            <div class="grid gap-6 sm:gap-7 md:gap-8 md:grid-cols-3">
                <!-- Call / WhatsApp -->
                <article class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up flex flex-col">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-500/20 text-emerald-200">
                            <i class="fas fa-phone-alt text-sm"></i>
                        </span>
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-emerald-300/80">Call / WhatsApp</p>
                            <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                Talk through your idea
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm sm:text-base mb-2">
                        +94 779 404 553
                    </p>
                    <p class="text-gray-400 text-xs sm:text-sm mb-4 flex-1">
                        Best for quick introductions, clarifying scope, and seeing if we’re a good fit.
                    </p>
                    <p class="text-[11px] sm:text-xs text-slate-500">
                        Usually available 9am – 7pm (IST), Monday to Saturday.
                    </p>
                </article>

                <!-- Email -->
                <article class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up flex flex-col">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-sky-500/20 text-sky-200">
                            <i class="fas fa-envelope text-sm"></i>
                        </span>
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-sky-300/80">Email</p>
                            <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                Share project details
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-300 text-sm sm:text-base break-words mb-2">
                        chamikara38@gmail.com
                    </p>
                    <p class="text-gray-400 text-xs sm:text-sm mb-4 flex-1">
                        Ideal for sending briefs, links, references, and timelines so I can review everything properly.
                    </p>
                    <a href="mailto:chamikara38@gmail.com" class="inline-flex items-center gap-2 text-[11px] sm:text-xs text-emerald-200 hover:text-emerald-100 transition-colors duration-300">
                        <i class="fas fa-arrow-right text-[10px]"></i>
                        Write an email
                    </a>
                </article>

                <!-- Social / collaboration -->
                <article class="glass-dark rounded-3xl border border-white/10 p-5 sm:p-6 fade-in-up flex flex-col">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-fuchsia-500/20 text-fuchsia-200">
                            <i class="fas fa-share-alt text-sm"></i>
                        </span>
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-[0.22em] text-fuchsia-300/80">Social</p>
                            <h3 class="text-sm sm:text-base md:text-lg font-semibold text-slate-50">
                                Follow & say hello
                            </h3>
                        </div>
                    </div>
                    <p class="text-gray-300 text-xs sm:text-sm mb-4 flex-1">
                        See what I’m working on, explore experiments, or drop a quick message.
                    </p>
                    <div class="flex flex-wrap gap-3 sm:gap-4">
                        <a href="https://facebook.com" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-full glass flex items-center justify-center text-blue-500 hover:text-blue-400 transition-colors duration-300">
                            <i class="fab fa-facebook-f text-xs sm:text-sm"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-full glass flex items-center justify-center text-sky-400 hover:text-sky-300 transition-colors duration-300">
                            <i class="fab fa-linkedin-in text-xs sm:text-sm"></i>
                        </a>
                        <a href="https://github.com" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-full glass flex items-center justify-center text-slate-100 hover:text-slate-300 transition-colors duration-300">
                            <i class="fab fa-github text-xs sm:text-sm"></i>
                        </a>
                        <a href="https://whatsapp.com" target="_blank"
                           class="w-9 h-9 sm:w-10 sm:h-10 rounded-full glass flex items-center justify-center text-emerald-400 hover:text-emerald-300 transition-colors duration-300">
                            <i class="fab fa-whatsapp text-xs sm:text-sm"></i>
                        </a>
                    </div>
                </article>
            </div>

            <div class="mt-10 sm:mt-12 md:mt-14 text-center fade-in-up">
                <p class="text-xs sm:text-sm text-slate-400 max-w-2xl mx-auto">
                    Not sure where to start? A short email with a few bullet points about your idea, budget range, and
                    timeline is perfect. I’ll suggest a good next step from there.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection
