<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('title')->with('student')->paginate(10);

        return inertia('subjects/Index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return inertia('subjects/Create', [
            'students' => $students
        ]);
        return inertia('subjects/Create');
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
            'title' => 'required|unique:subjects',
            'units' => 'required',
            'pay_units' => 'required',
            'student_id' => 'required',
        ]);

        Subject::create([
            'title' => $request->title,
            'units' => $request->units,
            'pay_units' => $request->pay_units,
            'student_id' => $request->student_id,
        ]);

        return redirect('/subjects')->with('success', 'A new subject has been added.');
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
        $subject = Subject::with('student')->findOrFail($id);
        $students = Student::all();

        return Inertia::render('subjects/Edit', [
            'subject' => $subject,
            'students' => $students,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => 'required|unique:subjects,title,' . $subject->id,
            'units' => 'required',
            'pay_units' => 'required',
            'student_id' => 'required',
        ]);

        $subject->update([
            'title' => $request->input('title'),
            'units' => $request->input('units'),
            'pay_units' => $request->input('pay_units'),
            'student_id' => $request->input('student_id'),
        ]);


        return redirect('/subjects')->with('success', 'The subject detail updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $subject = Subject::with('student')->findOrFail($id);
        $students = Student::all();

        return Inertia::render('subjects/Delete', [
            'subject' => $subject,
            'students' => $students,
        ]);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect('/subjects')->with('success', 'Subject deleted from list successfully');
    }

    public function view($id)
    {
        $subjects = Subject::with('student')->findOrFail($id);
        $students = Student::all();

        return Inertia::render('subjects/View', [
            'subjects' => $subjects,
            'students' => $students,
        ]);
    }
}
