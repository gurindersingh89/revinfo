@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('teachers.index') }}" class="ml-4 text-sm text-gray-700 underline">View Teachers</a>
                </div>
                <div class="card-body">
                    <a href="{{ route('students.index') }}" class="ml-4 text-sm text-gray-700 underline">View Students</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection