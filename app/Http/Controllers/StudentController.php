<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(){
        $student = Students::all();
        // dd($student);
        return view('welcome', compact('student'));
    }



    public function create(){
        return view('create');
    }



    public function store(Request $request){
        $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'mail'      => 'required',
            'phone'     => 'required',
        ]);

        $student = new Students();

        $student->first_name    = $request->firstname;
        $student->last_name     = $request->lastname;
        $student->email         = $request->mail;
        $student->phone         = $request->phone;

        $student->save();

        return redirect(route('home'))->with('successMsg', 'student successfully added');
    }



    public function edit($id){
        $student = Students::find($id);
        // dd($student);

        return view('edit', compact('student'));
    }



    public function update(Request $request, $id){
        $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'mail'      => 'required',
            'phone'     => 'required',
        ]);

        $student = Students::find($id);

        $student->first_name    = $request->firstname;
        $student->last_name     = $request->lastname;
        $student->email         = $request->mail;
        $student->phone         = $request->phone;
        
        $student->save();

        return redirect(route('home'))->with('successMsg', "student successfully updated");
    }

}
