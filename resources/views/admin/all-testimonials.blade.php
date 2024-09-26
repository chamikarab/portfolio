@extends('layouts.admin')

@section('content')

<h1>All Testimonials</h1>

<div class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="m-b-30">
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-default waves-effect waves-light">Add New Testimonial <i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="">
            <table class="table table-striped" id="datatable-editable">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Testimonial</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                        <tr class="gradeX">
                            <td>{{ $testimonial->client_name }}</td>
                            <td>{{ $testimonial->testimonial }}</td>
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