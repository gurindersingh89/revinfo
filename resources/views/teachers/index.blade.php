@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="row">
            <div class="col-lg-12 ">
                <div style="float:right">
                    <a class="btn btn-success" href="{{ route('teachers.create') }}"> Create New teacher</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($teachers as $teacher)
            <tr>
                <td>{{$teacher->id}}</td>
                <td><img src="/images/{{ $teacher->image }}" width="150px" height="150px"></td>
                <td>{{ $teacher->name }}</td>
                <td>
                    <form action="{{ route('teachers.destroy',$teacher->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('teachers.show',$teacher->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $teachers->links() !!}
    </div>
</div>
@endsection