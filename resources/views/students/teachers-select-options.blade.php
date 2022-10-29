<div class="form-group mb-2">
    <label for="teachers">Select Teacher</label>
    <select id="select_teacher" class="form-control" name="teacher_id">
        <option value=""></option>
        @foreach($teachers as $teacher)
        <option value="{{ $teacher->id }}" {{ ( $teacher->id == old('teacher_id', $teacher_id)) ? 'selected' : '' }}> {{$teacher->name}}</option>
        @endforeach
    </select>
</div>
