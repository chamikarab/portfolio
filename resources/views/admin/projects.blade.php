@extends('layouts.admin')

@section('content')

<h1>Add New Project</h1>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="m-t-0 header-title"><b>Add Project</b></h4>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="projectName">Project Name*</label>
                    <input type="text" name="name" placeholder="Project Name" required class="form-control" id="projectName">
                </div>

                <div class="form-group">
                    <label for="projectImage">Project Image*</label>
                    <input type="file" name="image" required class="form-control" id="projectImage">
                </div>

                <div class="form-group">
                    <label for="projectCategory">Category*</label>
                    <input type="text" name="category" placeholder="Category" required class="form-control" id="projectCategory">
                </div>

                <div class="form-group">
                    <label for="projectDescription">Description*</label>
                    <textarea name="description" placeholder="Description" required class="form-control" id="projectDescription"></textarea>
                </div>

                <div class="form-group text-right m-b-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Add Project</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection