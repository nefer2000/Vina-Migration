<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{

    public function studentList() {
        $allData = Students::all();
        return view('students.index', ['data' => $allData]);
    }

    public function index() {
        $allData = Students::all();
        return view('LandingPage.index', ['data' => $allData]);
    }

    public function newStudent() {
        return view('students.addStudent');
    }


    public function store(Request $request) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'sex' => ['required'],
            'age' => ['required'],
            'email' => ['required', 'email', Rule::unique('students', 'email')],  
        ]);

        Students::create($validated);

        return redirect('/list') -> with('message', 'New student created successfully!');
    }

    public function show($id) {
        $data = Students::findOrFail($id);
        return view('students.editStudent', ['data' => $data]);
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'sex' => ['required'],
            'age' => ['required'],
            'email' => ['required', 'email'],  
        ]);

        $student = Students::find($id);
        $student->first_name = $validated['first_name'];
        $student->last_name = $validated['last_name'];
        $student->sex = $validated['sex'];
        $student->age = $validated['age'];
        $student->email = $validated['email'];
        $student->update();

        //$student->update($validated);

        return redirect('/list')->with('message', 'Updated Sucessfully');
    }

    public function deleteStudent(Request $request, $id) {
        $student = Students::find($id);
        
        $student->delete();
 
        return redirect('/list')->with('message', 'Deleted Sucessfully');
    }
}