@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Teacher
                        <a class="btn btn-primary float-end" href="{{ route('teachers.index') }}"> Back</a>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $teacher->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <img src="/images/{{ $teacher->image }}" width="500px">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection