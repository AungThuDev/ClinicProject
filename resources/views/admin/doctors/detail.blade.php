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
                    <h3>{{$doctor->name}}</h3>
                    <p>{{$doctor->address}}</p>
                </div>
            </div>

            
          </div>
        </div>
        <div class="row mt-2">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    @if($doctor->schedules->isEmpty())
                    <a href="{{route('doctors.addSchedule',$doctor->id)}}" class="btn btn-success float-right">Add Schedule</a>
                    @endif
                    <h3 class="card-title">Doctor Schedule Table</h3>
                </div>
                <div class="card-body">
                    <h3>{{$doctor->name}}</h3>
                      
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