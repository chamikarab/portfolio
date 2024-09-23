@extends('layouts.admin')

@section('content')

<h1>All Projects</h1>

<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-default waves-effect waves-light">Add New Project <i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="">
            <table class="table table-striped" id="datatable-editable">
                <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr class="gradeX">
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->category }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" style="width: 100px;">
                            </td>
                            <td class="actions">
                                <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection