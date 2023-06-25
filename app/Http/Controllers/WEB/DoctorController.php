<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        //$day = config('days');
        //dd($day);
        $departments = Department::all();
        return view('admin.doctors.index',compact('doctors','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        //dd($departments);
        return view('admin.doctors.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = validator($request->all(),[
            "name" => "required",
            "address" => "required",
            "phone_no" => "required",
            "department_id" => "required",
            "qualification" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->address = $request->address;
        $doctor->phone_no = $request->phone_no;
        $doctor->department_id = $request->department_id;
        $doctor->qualification = $request->qualification;
        $doctor->save();

        return redirect()->route('doctors.index')->with('info','Doctor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctors.detail',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        return view('admin.doctors.edit',compact('doctor','departments'));        
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
        $validator = validator($request->all(),[
            "name" => "required",
            "address" => "required",
            "phone_no" => "required",
            "department_id" => "required",
            "qualification" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->address = $request->address;
        $doctor->phone_no = $request->phone_no;
        $doctor->department_id = $request->department_id;
        $doctor->qualification = $request->qualification;
        $doctor->save();

        return redirect()->route('doctors.index')->with('info','updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctors.index')->with('info','deleted successfully');
    }
}
