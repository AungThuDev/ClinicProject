@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Clinic X Admin Page</h1>
            <a href="{{ route('doctors.index') }}" class="btn btn-success">Back</a>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Doctor's information</h3>
                </div>
                <div class="card-body">
                    <p class="card-text"><b>Doctor's Name</b> : {{$doctor->name}}</p>
                    <p class="card-text"><b>Address</b> : {{$doctor->address}}</p>
                    <p class="card-text"><b>Phone No.</b> : {{$doctor->phone_no}}</p>
                    <p class="card-text"><b>Department</b> : {{$doctor->department->name ?? ''}}</p>
                    <p class="card-text"><b>Qualification</b> : {{$doctor->qualification}}</p>
                </div>
            </div>

            
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Doctor Schedule Table</h3>
                    @if(count($doctor->schedules) == 0)
                    <a href="{{route('doctors.addSchedule',$doctor->id)}}" class="btn btn-success float-right">Add Schedule</a>
                    @endif
                    
                </div>
                  
                  <div class="card-body">
                    @foreach($schedules as $schedule)
                    @if($doctor->id == $schedule->doctor_id)
                    <div class="row">
                      <div class="col mb-3 mb-sm-0">
                        <div class="card">
                          <div class="card-body">
                            <p class="card-text"><b>Day</b> : {{$schedule->day}}</p>
                        <div class="row">
                          <div class="col">
                            <p class="card-text"><b>start Time</b> : {{$schedule->start_time}}</p>
                        <p class="card-text"><b>End Time</b> : {{$schedule->end_time}}</p>
                        <a href="{{route('doctors.editSchedule',$schedule->id)}}" class="btn btn-warning">Edit Schedule</a>
                        <form action="{{route('doctors.deleteSchedule', $schedule->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Are you sure you want to delete this names?');"
                            class="btn btn-danger">Delete</button>
                        </form>
                          </div>
                        </div>
                      </div>
                      </div>
                    
                    
                                          
                </div>
                 
            </div>
            @endif
            @endforeach
            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection</h2>