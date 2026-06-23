<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestimonialController;

// Sitemap
Route::get('/sitemap.xml', function () {

    $baseUrl = rtrim(config('app.url'), '/');
    $now = now()->format('Y-m-d');

    $urls = [
        ['loc' => $baseUrl . '/', 'priority' => '1.0'],
        ['loc' => $baseUrl . '/about', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/projects', 'priority' => '0.8'],
        ['loc' => $baseUrl . '/contact', 'priority' => '0.8'],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    foreach ($urls as $entry) {
        $xml .= '<url>';
        $xml .= '<loc>' . $entry['loc'] . '</loc>';
        $xml .= '<lastmod>' . $now . '</lastmod>';
        $xml .= '<changefreq>monthly</changefreq>';
        $xml .= '<priority>' . $entry['priority'] . '</priority>';
        $xml .= '</url>';
    }

    $xml .= '</urlset>';

    return response($xml, 200)
        ->header('Content-Type', 'application/xml');
});

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

// Serve uploaded images (fallback if direct access doesn't work)
Route::get('/uploads/{filename}', function ($filename) {
    $path = public_path('uploads/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    $mimeType = mime_content_type($path);
    if (!$mimeType) {
        $mimeType = 'image/webp'; // Default for .webp files
    }
    
    return response()->file($path, [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=31536000', // Cache for 1 year
    ]);
})->where('filename', '[a-zA-Z0-9_\-\.]+')->name('uploads.serve');

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
    Route::delete('/admin/projects/{projectId}/images/{imageId}', [ProjectController::class, 'destroyImage'])->name('admin.projects.images.destroy');
    Route::delete('/admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    // Testimonial routes
    Route::get('/admin/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
    Route::post('/admin/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
    Route::get('/admin/all-testimonials', [TestimonialController::class, 'allTestimonials'])->name('admin.all-testimonials');
    Route::get('/admin/testimonials/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
    Route::put('/admin/testimonials/{id}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
    Route::delete('/admin/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
});