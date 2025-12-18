@extends('layouts.admin')

@section('title', 'Add Testimonial')

@section('content')

<div class="admin-card">
    <div class="admin-card-header">
        <h1 class="admin-page-title">Add New Testimonial</h1>
        <a href="{{ route('admin.all-testimonials') }}" class="admin-btn-ghost">Back to list</a>
    </div>
    <p class="admin-page-subtitle">Capture what your clients say about working with you.</p>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf
        <div class="form-group" style="margin-bottom:10px;">
            <label for="clientName" style="font-size:12px;color:#e5e7eb;">Client Name*</label>
            <input type="text" name="name" placeholder="Client Name" required class="admin-form-control" id="clientName">
        </div>

        <div class="form-group" style="margin-bottom:16px;">
            <label for="testimonial" style="font-size:12px;color:#e5e7eb;">Testimonial*</label>
            <input type="text" name="testimonial" placeholder="Testimonial" required class="admin-form-control" id="testimonial">
        </div>

        <div style="text-align:right;">
            <button type="submit" class="admin-btn-primary">Save Testimonial</button>
        </div>
    </form>
</div>

@endsection