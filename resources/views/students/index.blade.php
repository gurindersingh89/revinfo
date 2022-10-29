@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div style="float:right">
                    <a class="btn btn-success" href="{{ route('students.create') }}"> Create New student</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="form-group mb-2">
                    <label for="teachers">Select Teacher</label>
                    <select id="select_teacher" class="form-control">
                        <option value=""></option>
                        @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ ( $teacher->id == request('teacher_id')) ? 'selected' : '' }}> {{$teacher->name}}</option>
                        @endforeach
                    </select>
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
                <th>Teacher name</th>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{ $student->teacher->name }}</td>
                <td>{{ $student->name }}</td>
                <td>
                    <form action="{{ route('students.destroy',$student->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {!! $students->links() !!}
    </div>
</div>
<script>
    document.getElementById('select_teacher').addEventListener('change', e => {
        window.location.href = '/students?teacher_id=' + e.target.value; // reloads the page
    });
</script>
@endsection