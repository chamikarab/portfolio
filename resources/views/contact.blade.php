@extends('layouts.app')

@section('content')

    <div class="contact-me-container bg-black py-16 px-8 text-center text-white">
    <h2 class="text-3xl font-bold mt-10 mb-20 text-center">
            <span class="border-b-4 border-yellow-400">Contact</span>
            <span class="text-yellow-400">Me</span>
        </h2>


        <!-- Contact Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <!-- Phone Number -->
            <div class="contact-item bg-black p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex justify-center items-center mb-6">
                    <i class="fas fa-phone-alt text-yellow-400 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Phone Number</h3>
                <p class="text-gray-400">+94 779 404 553</p>
            </div>

            <!-- Social Media Links -->
            <div class="contact-item bg-black p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex justify-center items-center mb-6">
                    <i class="fas fa-user-circle text-yellow-400 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Social Media</h3>
                <div class="flex justify-center space-x-6">
                    <a href="https://facebook.com" target="_blank" class="text-blue-600 hover:text-blue-700 transition duration-200">
                        <i class="fab fa-facebook-f text-3xl"></i>
                    </a>
                    <a href="https://whatsapp.com" target="_blank" class="text-green-500 hover:text-green-600 transition duration-200">
                        <i class="fab fa-whatsapp text-3xl"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="text-blue-700 hover:text-blue-800 transition duration-200">
                        <i class="fab fa-linkedin-in text-3xl"></i>
                    </a>
                </div>
            </div>

            <!-- Email -->
            <div class="contact-item bg-black p-8 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <div class="flex justify-center items-center mb-6">
                    <i class="fas fa-envelope text-yellow-400 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Email</h3>
                <p class="text-gray-400">chamikara38@gmail.com</p>
            </div>
        </div>

        <!-- Additional Info Section (Optional) -->
        <div class="bg-black p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            <h3 class="text-xl font-semibold mb-4">Additional Information</h3>
            <p class="text-gray-400">Feel free to reach out via any of the above methods. I'm always open to work, collaboration, or casual conversations!</p>
        </div>
    </div>
</section>
@endsection