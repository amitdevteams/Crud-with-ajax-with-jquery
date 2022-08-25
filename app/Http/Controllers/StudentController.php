<?php

namespace App\Http\Controllers;

use App\Student;

use DB;
use Illuminate\Http\Request;
use Log;

class StudentController extends Controller
{

    public function index()
    {
        return view('students.index');
    }

    public function showdata($id)
    {
        $student = Student::find($id);
        
        return response()->json([
            'status' => 200,
            'student' => $student,

        ]);
       
    }
    public function store(Request $request)
    {
        
        log::info("hii");

        $request->validate([
            'name' => ['required'],
            'class' => ['required'],
            'email' =>['required'],
            'phone' => ['required'],
            'subject' => ['required'],
            'address' => ['required']
    ]);

        $data = new Student;
        $data->name = $request->name;
        $data->class = $request->class;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->subject = $request->subject;
        $data->address = $request->address;

        $data->save();
        return response()->json([
            'status' => 200,
            'message' => 'Data Saved Succesufully'
        ]);
      
    }

    

    public function show(Student $student)
    {
        $student= Student::all();
        return response()->json([
            'students'=>$student,
        ]);
         
    }

    public function edit($id)
    {
        $student = Student::find($id);
        
            return response()->json([
                'status' => 200,
                'student' => $student,
            ]);

    }
    

    
    public function update(Request $request, $id)
    {
        //
        // log::info($request->all());
        $students = Student::find($id);
        log::info($request->name);
        log::info($id);
        
       $students->name = $request->name;
       $students->class = $request->class;
       $students->email = $request->email;
       $students->phone = $request->phone;
       $students->subject = $request->subject;
       $students->address = $request->address;

       

       
       $students->save();
        return response()->json([
            'status' => 200,
            'message'=>'Data Updated Successfully',
        ]);
    }

    public function destroy(Student $student,$id)
    {
        //
        $students = Student::find($id);
        log::info($id);
        $students->delete();

        return response()->json([
            'status'=>200,
            'delete'=>'Data Delete Successfull',
        ]);
    }

}
