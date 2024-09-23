<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // //all projects
    // public function allProjects()
    // {
    //     return view('admin.all-projects');
    // }

    public function testimonials()
    {
        return view('admin.testimonials');
    }
}



