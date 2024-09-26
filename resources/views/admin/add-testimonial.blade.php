@extends('layouts.admin')

@section('content')

<h1>Add New Testimonial</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Add Testimonial</b></h4>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.testimonials.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="clientName">Client Name*</label>
                    <input type="text" name="name" placeholder="Client Name" required class="form-control" id="clientName">
                </div>

                <div class="form-group">
                    <label for="testimonial">Testimonial*</label>
                    <input type="text" name="testimonial" placeholder="Testimonial" required class="form-control" id="testimonial">
                </div>

                <div class="form-group text-right m-b-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection