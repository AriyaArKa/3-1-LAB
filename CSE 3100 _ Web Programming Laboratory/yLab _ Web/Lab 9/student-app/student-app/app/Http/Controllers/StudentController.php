<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:students,email',
            'age'=>'required|integer|min:1'
        ]);
        //create student
        Student::create($data);
        return redirect(route('student.create'))->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
       
        $student->update($request->all());
        return redirect(route('student.index'))->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('student.index'))->with('success','Student deleted successfully.');
    }
    
}
