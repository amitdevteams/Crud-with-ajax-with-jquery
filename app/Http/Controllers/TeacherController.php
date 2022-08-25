<?php

namespace App\Http\Controllers;
use App\Teacher;
use DB;
use Illuminate\Http\Request;
use Log;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function showdata($id)
    {
        $student = Student::find($id);
        
        return response()->json([
            'status' => 200,
            'student' => $student,

        ]);
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        log::info("hii");

        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' =>['required'],
            'phone' => ['required'],
            'address' => ['required']
    ]);

        $data = new Teacher;
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();
        return response()->json([
            'status' => 200,
            'message' => 'Data Saved Succesufully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $student= Teacher::all();
        return response()->json([
            'students'=>$student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        
            return response()->json([
                'status' => 200,
                'student' => $teacher,

            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // log::info($request->all());
        $students = Teacher::find($id);
        log::info($request->first_name);
        log::info($id);
        
       $students->first_name = $request->first_name;
       $students->last_name = $request->last_name;
       $students->email = $request->email;
       $students->phone = $request->phone;
       $students->address = $request->address;

       

       
       $students->save();
        return response()->json([
            'status' => 200,
            'message'=>'Data Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Teacher::find($id);
        log::info($id);
        $students->delete();

        return response()->json([
            'status'=>200,
            'delete'=>'Data Delete Successfull',
        ]);
    }
}
