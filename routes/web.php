<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestimonialController;

// Maintenance page route
Route::get('/maintenance', function () {
    return view('maintenance');
})->name('maintenance');

// Coming Soon page route
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

// Home and About routes
Route::get('/', [ProjectController::class, 'homeprojects'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');

// Public project listing
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');

// Diagnostic route for storage debugging (remove in production or protect with auth)
// Usage: /storage-diagnostic?path=projects/filename.jpg
Route::get('/storage-diagnostic', function () {
    $path = request()->query('path', 'projects');
    
    return response()->json([
        'requested_path' => $path,
        'storage_path_exists' => file_exists(storage_path('app/public/' . $path)),
        'storage_disk_exists' => Storage::disk('public')->exists($path),
        'storage_url' => Storage::disk('public')->url($path),
        'public_storage_exists' => file_exists(public_path('storage')),
        'public_storage_is_link' => is_link(public_path('storage')),
        'public_storage_target' => is_link(public_path('storage')) ? readlink(public_path('storage')) : null,
        'config_url' => config('filesystems.disks.public.url'),
        'app_url' => config('app.url'),
    ], 200, [], JSON_PRETTY_PRINT);
})->name('storage.diagnostic');

// Admin Authentication routes (public)
// Redirect default 'login' route to admin login for compatibility
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/toggle-maintenance', [AdminController::class, 'toggleMaintenance'])->name('admin.toggle-maintenance');
    Route::post('/admin/toggle-coming-soon', [AdminController::class, 'toggleComingSoon'])->name('admin.toggle-coming-soon');

    // Project routes
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/all-projects', [ProjectController::class, 'allProjects'])->name('admin.all-projects');
    Route::get('/admin/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Testimonial routes
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/all-testimonials', [TestimonialController::class, 'allTestimonials'])->name('admin.all-testimonials');
    Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
});