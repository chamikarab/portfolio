@extends('layouts.app')

@section('title', 'Chamikara Bandara - Portfolio')

@section('content')

<!-- Hero -->
<section id="hero" class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('hero-image.jpg') }}');">
    <div class="container mx-auto flex items-center justify-start h-full">
        <div class="text-left">
            <h1 class="text-white text-3xl mb-4">HELLO, I'M</h1>
            <h2 class="text-white text-2xl sm:text-5xl font-bold mb-4">CHAMIKARA BANDARA</h2>
            <h3 class="text-white text-xl sm:text-4xl font-bold mb-8">I'M <span class="typed-text" id="typed-text"></span></h3>
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
            </div>
        </div>
    </div>
</section>

<div class="relative bg-cover bg-center w-full h-[400px]" style="background-image: url('/Banner-2.jpg');">
    <div class="absolute inset-0 bg-black bg-opacity-60"></div>
    <div class="relative z-10 flex flex-col justify-center items-center h-full text-white text-center">
        <h2 class="text-4xl font-bold mb-8">I Am Available For Freelancer</h2>
        <a href="#" class="bg-red-500 text-white px-6 py-3 rounded-lg">Hire Me Now</a>

        <div class="grid grid-cols-4 gap-8 mt-12 text-white text-center">
            <div>
                <h3 class="text-5xl font-bold counter" data-target="8">0+</h3>
                <p class="text-xl">Years of Experience</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold counter" data-target="54">0+</h3>
                <p class="text-xl">Projects Completed</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold counter" data-target="24">0+</h3>
                <p class="text-xl">Happy Clients</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold counter" data-target="14">0+</h3>
                <p class="text-xl">Satisfied Clients</p>
            </div>
        </div>
    </div>
</div>



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



<section id="projects" class="py-20">
<div class="home-page-container bg-dark text-white py-20 px-10">
    <div class="container mx-auto">
     <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">My</span>
            <span class="border-b-4 border-yellow-400">Projects</span>
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse ($projects as $project)
                <div class="p-6 rounded-lg shadow-lg transition duration-300 ease-in-out project-card-2">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h2 class="text-1xl font-semibold text-yellow-400 mb-2">{{ $project->name }}</h2>
                    <p class="text-gray-400 mb-4">{{ Str::limit($project->description, 120) }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="inline-block text-yellow-400 hover:text-yellow-300 font-low">
                        View Project &rarr;
                    </a>
                </div>
            @empty
                <p class="text-center col-span-3 text-gray-500">No recent projects available to display at the moment.</p>
            @endforelse
        </div>

        <!-- Static example projects if $projects collection is empty -->
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
</section>

<!-- Education Section -->
<section id="education" class="py-20 bg-dark text-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">My</span>
            <span class="border-b-4 border-yellow-400">Education</span>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="education-item bg-gray-900 p-6 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-certificate text-6xl text-yellow-400"></i>
                    <div class="ml-6 text-left">
                        <h4 class="text-xl font-bold">Passed G.C.E Odinary Level</h4>
                        <p class="text-gray-400">Kingswood College, Kandy</p>
                        <p class="text-sm text-gray-500">2017</p>
                    </div>
                </div>
            </div>

            <div class="education-item bg-gray-900 p-6 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-6xl text-yellow-400"></i>
                    <div class="ml-6 text-left">
                        <h4 class="text-xl font-bold">Diploma in PC Hardware Engineering & Network Administration</h4>
                        <p class="text-gray-400">Esoft Metro Campus, Kandy</p>
                        <p class="text-sm text-gray-500">2018</p>
                    </div>
                </div>
            </div>

            <div class="education-item bg-gray-900 p-6 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-certificate text-6xl text-yellow-400"></i>
                    <div class="ml-6 text-left">
                        <h4 class="text-xl font-bold">Passed G.C.E Advanced Level</h4>
                        <p class="text-gray-400">Kingswood College, Kandy</p>
                        <p class="text-sm text-gray-500">2020</p>
                    </div>
                </div>
            </div>

            <div class="education-item bg-gray-900 p-6 rounded-lg">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-6xl text-yellow-400"></i>
                    <div class="ml-6 text-left">
                        <h4 class="text-xl font-bold">Undergraduate in Information Technology</h4>
                        <p class="text-gray-400">Sri Lankan Institute of Information Technology(SLIIT)</p>
                        <p class="text-sm text-gray-500">2022 - Present</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Experience Section -->
<div class="container mx-auto py-12 px-4 text-white">
    <h2 class="text-4xl font-bold text-center mb-12">Experience</h2>


    <div class="relative">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-1 bg-gray-600 h-full"></div>

        <div class="mb-8 flex items-center justify-between w-full opacity-0 transition-opacity duration-1000 ease-out transform translate-y-4">
            <div class="w-5/12 text-right">
                <h3 class="text-2xl font-bold">Web Developer</h3>
                <span class="text-yellow-500">Refectline(Pvt)Ltd | Full Time</span>
                <p class="mt-2 text-gray-300">At Refectline, I specialize in developing WordPress websites and working with PHP for custom solutions. I also focus on frontend development, designing graphic posts, and editing videos. Over time, I have expanded my skills to include Laravel and the MERN stack, transitioning from WordPress to more advanced frameworks.</p>
                <span class="text-gray-400">2020 - 2022</span>
            </div>
            <div class="relative w-10 h-10 bg-yellow-500 rounded-full z-10"></div>
            <div class="w-5/12"></div>
        </div>

        <div class="mb-8 flex items-center justify-between w-full flex-row-reverse opacity-0 transition-opacity duration-1000 ease-out transform translate-y-4">
            <div class="w-5/12 text-left">
                <h3 class="text-2xl font-bold">System Maintainer & IT Operator</h3>
                <span class="text-yellow-500">HQ Restaurant | Part Time</span>
                <p class="mt-2 text-gray-300">As a system maintainer at HQ Restaurant, I managed technical operations, ensuring smooth functioning of IT systems. I resolved issues in the billing system and also contributed by creating digital content for promotional purposes.</p>
                <span class="text-gray-400">2017 - 2020</span>
            </div>
            <div class="relative w-10 h-10 bg-yellow-500 rounded-full z-10"></div>
            <div class="w-5/12"></div>
        </div>

        <div class="mb-8 flex items-center justify-between w-full opacity-0 transition-opacity duration-1000 ease-out transform translate-y-4">
            <div class="w-5/12 text-right">
                <h3 class="text-2xl font-bold">Web Developer & Graphic Designer</h3>
                <span class="text-yellow-500">Recode99(Pvt)Ltd | Part Time</span>
                <p class="mt-2 text-gray-300">I initially joined Recode99 for graphic design, video editing, and creating social media posts for various clients. Eventually, I extended my role to include web development, where I built and maintained WordPress websites.</p>
                <span class="text-gray-400">2017 - 2019</span>
            </div>
            <div class="relative w-10 h-10 bg-yellow-500 rounded-full z-10"></div>
            <div class="w-5/12"></div>
        </div>
    </div>
</div>

<!-- Skills Section -->
<section id="skills" class="py-20 bg-dark text-white">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">My</span>
            <span class="border-b-4 border-yellow-400">Skills</span>
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-10">
            <div class="skill-item" data-aos="fade-up" data-aos-delay="50">
                <i class="fab fa-html5 text-6xl text-orange-500"></i>
                <h4 class="mt-3">HTML</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="100">
                <i class="fab fa-css3-alt text-6xl text-blue-500"></i>
                <h4 class="mt-3">CSS</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="150">
                <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind CSS Logo" class="h-11 mx-auto">
                <h4 class="pt-4">Tailwind CSS</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="200">
                <i class="fab fa-js-square text-6xl text-yellow-500"></i>
                <h4 class="mt-3">JavaScript</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="250">
                <i class="fab fa-php text-6xl text-blue-900"></i>
                <h4 class="mt-3">PHP</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="300">
                <i class="fab fa-laravel text-6xl text-red-600"></i>
                <h4 class="mt-3">Laravel</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="350">
                <i class="fas fa-database text-6xl text-green-600"></i>
                <h4 class="mt-3">MongoDB</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="400">
                <i class="fab fa-node text-6xl text-green-500"></i>
                <h4 class="mt-3">Express JS</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="450">
                <i class="fab fa-react text-6xl text-blue-400"></i>
                <h4 class="mt-3">React JS</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="500">
                <i class="fab fa-node-js text-6xl text-green-500"></i>
                <h4 class="mt-3">Node JS</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="550">
                <i class="fab fa-github text-6xl text-white"></i>
                <h4 class="mt-3">GitHub</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="600">
                <i class="fas fa-database text-6xl text-blue-600"></i>
                <h4 class="mt-3">MySQL</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="650">
                <i class="fas fa-server text-6xl text-red-500"></i>
                <h4 class="mt-3">SQL Server</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="700">
                <i class="fab fa-wordpress text-6xl text-blue-600"></i>
                <h4 class="mt-3">WordPress</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="750">
                <i class="fab fa-figma text-6xl text-pink-500"></i>
                <h4 class="mt-3">Figma</h4>
            </div>
            <div class="skill-item" data-aos="fade-up" data-aos-delay="800">
                <i class="fab fa-bootstrap text-6xl text-purple-500"></i>
                <h4 class="mt-3">Bootstrap</h4>
            </div>
        </div>
    </div>
</section>


<!-- Contact -->
<section id="contact" class="py-20">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold mb-20 text-center">
            <span class="text-yellow-400">Get In</span>
            <span class="border-b-4 border-yellow-400">Touch</span>
        </h2>
        <form action="{{ route('contact.submit') }}" method="POST" class="max-w-lg mx-auto">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-white">Your Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-white">Your Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="message" class="block text-white">Message</label>
                <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 rounded-lg border focus:outline-none" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="bg-yellow-400 text-black px-6 py-3 rounded-lg">Send Message</button>
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
<script>
  // animate the numbers
  function animateCounter(counter) {
    const target = +counter.getAttribute('data-target');
    const increment = target / 80; 

    let currentValue = 0;

    const updateCounter = () => {
      currentValue += increment;
      if (currentValue < target) {
        counter.innerText = `${Math.ceil(currentValue)}+`;
        setTimeout(updateCounter, 10);
      } else {
        counter.innerText = `${target}+`;
      }
    };

    updateCounter();
  }


  const counters = document.querySelectorAll('.counter');
  const options = {
    root: null, 
    threshold: 0.5,
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        observer.unobserve(entry.target); 
      }
    });
  }, options);

  counters.forEach(counter => {
    observer.observe(counter); 
  });
</script>


<script>
    // animate the experience section
  document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll('.mb-8');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 
    });

    items.forEach(item => {
        observer.observe(item);
    });
});

</script>


@endsection
