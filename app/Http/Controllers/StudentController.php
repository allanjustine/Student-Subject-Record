<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id_number')->with('subjects')->paginate(10);

        return inertia('students/Index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('students/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:students',
            'name' => 'required|unique:students',
            'address' => 'required',
            'phone' => 'required',
            'date_of_birth' => 'required',
        ]);

        Student::create([
            'id_number' => $request->id_number,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
        ]);

        return redirect('/students')->with('success', 'A new student has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return Inertia::render('students/Edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'id_number' => $request->input('id_number'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'phone' => $request->input('phone'),
            'date_of_birth' => $request->input('date_of_birth'),

        ]);


        return redirect('/students')->with('success', 'The student updated successfully.');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);

        return Inertia::render('students/Delete', [
            'student' => $student,
        ]);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $subjectUse = Subject::where('student_id', $id)->exists();
        if ($subjectUse) {
            return back()->with('error', 'Cannot delete the student as it is in use by subjects.');
        }

        $student->delete();

        return redirect('/students')->with('success', 'Student deleted from list successfully');
    }

    public function view($id)
    {
        $student = Student::with('subjects')->findOrFail($id);
        $subjects = Subject::all();

        return Inertia::render('students/View', [
            'student' => $student,
            'subjects' => $subjects,
        ]);
    }
}
