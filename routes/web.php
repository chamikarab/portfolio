<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestimonialController;

// Home and About routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Admin Dashboard routes
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Project routes
Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
Route::get('/admin/all-projects', [ProjectController::class, 'allProjects'])->name('admin.all-projects');
Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
Route::get('/', [ProjectController::class, 'homeprojects'])->name('home');

// Public project listing
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

// Testimonial routes
Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
Route::get('/admin/all-testimonials', [TestimonialController::class, 'allTestimonials'])->name('admin.all-testimonials');
Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');