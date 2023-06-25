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
    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->doctor_id = $request->doctor_id;
         
        $schedule->save();
        return redirect()->route('doctors.index');
    }
    
}
