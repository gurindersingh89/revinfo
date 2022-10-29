<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Teacher;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # get teacher id
        $teacherId = request('teacher_id');

        # get all teachers
        $teachers = $this->getAllTeachers();

        # get students by pagination
        $students = Student::with('teacher')
            ->when($teacherId, function ($query) use ($teacherId) {
                $query->whereTeacherId($teacherId);
            })
            ->simplePaginate(10);

        return view('students.index', compact('students', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # get all teachers
        $teachers = $this->getAllTeachers();

        return view('students.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validatedAttributes = $request->validated();

        $teacher = Teacher::whereId($validatedAttributes['teacher_id'])->first();

        $teacher->students()->create($validatedAttributes);

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $teacher = Teacher::whereId($student->teacher_id)->first();

        # get all teachers
        $teachers = $this->getAllTeachers();

        return view('students.edit', compact('student', 'teacher', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validatedAttributes = $request->validated();

        $student->update($validatedAttributes);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully');
    }

    public function getAllTeachers()
    {
        # get all teachers
        return Teacher::select('id', 'name')->get();
    }
}
