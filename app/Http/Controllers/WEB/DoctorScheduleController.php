<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function create($id)
    {
        $days = config('days');
        $doctor = Doctor::find($id);
        return view('admin.doctors.create_schedule',compact('days','doctor'));
    }
    public function store(Request $request,Doctor $doctor)
    {
        $validator = validator($request->all(),[
            "day" => "required",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i|after:start_time",
            "doctor_id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $schedule = new Schedule();
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->doctor_id = $request->doctor_id;
         
        $schedule->save();
        return redirect()->route('doctors.show',['doctor'=>$request->doctor_id])->with('info','Schedule created successfully');
    }
    public function edit($id)
    {
        $days = config('days');
        $schedule = Schedule::find($id);
        return view('admin.doctors.edit_schedule',compact('days','schedule'));
    }
    public function update(Request $request,$id,Doctor $doctor)
    {
        $validator = validator($request->all(),[
            "day" => "required",
            "start_time" => "required|date_format:H:i",
            "end_time" => "required|date_format:H:i|after:start_time",
            "doctor_id" => "required",
        ]);
        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $schedule = Schedule::find($id);
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->doctor_id = $request->doctor_id;
        $schedule->save();
        return redirect()->route('doctors.show',['doctor'=>$request->doctor_id])->with('info','updated successfully');
    }
    public function delete($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->route('doctors.index')->with('info','deleted successfully');
    }
}
