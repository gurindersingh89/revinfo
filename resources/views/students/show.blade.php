@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Student
                        <a class="btn btn-primary float-end" href="{{ route('students.index') }}"> Back</a>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $student->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Teacher Name</strong>
                    {{ $student->teacher->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roll No:</strong>
                    {{ $student->roll_no }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection