<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View; //laravel 10 standart
use App\Models\student; /*path to model student to communicate*/

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = student::all();
        return view('student.index')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View 
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        // $input =new Student;
        // $input->name = $request->name;
        // $input->mobile = $request->mobile;
        // $input->address = $request->address;
        // $input->save();
        // return redirect()->route('student.index')->with('succcess');

        $input = new student;
        $input->name = $request->name;
        $input->mobile =$request->mobile;
        $input->address=$request->address;
        $input->save();
        return redirect('student');
        
        // $input = $request->all();
        // student::create($input);
        // return redirect('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = student::findOrFail($id);
        return view('student.show')->with('students',$students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    { 
        $students = student::findOrFail($id);
        return view('student.edit')->with('students',$students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $students = student::find($id);
        $input=$request->all();
        $students->update($input);
        return redirect('student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Student::destroy($id);
        return redirect('student');
    }
}
