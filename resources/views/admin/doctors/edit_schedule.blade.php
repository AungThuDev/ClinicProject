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
            <a href="{{ route('doctors.show',$schedule->doctor_id) }}" class="btn btn-success">Back</a>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      @if($errors->any())
    <div class="alert alert-warning">
        <ol>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ol>
    </div>
    @endif
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Doctor Schedule Table</h3>
                </div>
                <div class="card-body">
                      <form action="{{route('doctors.updateSchedule',$schedule->id)}}" method="POST">
                        @CSRF
                        <div class="form-group">
                            <label for="day">Days</label>
                            <select name="day" id="" class="form-control">
                                @foreach($days as $day)
                                @if($day == $schedule->day)
                                <option value="{{$day}}" selected>{{$day}}</option>
                                @endif
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Start Time</label>
                            <input type="text" value="{{$schedule->start_time}}" name="start_time" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">End Time</label>
                            <input type="text" value="{{$schedule->end_time}}" name="end_time" class="form-control">
                        </div>
                        <div>
                            <label for="">Doctor_Name</label>
                            <input type="text" class="form-control"  value="{{$schedule->doctor->name}}">
                        </div>
                        <button class="btn btn-success mt-2" type="submit">Update Schedule</button>
                      </form>
                      
                </div>
            </div>

            
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection</h2>