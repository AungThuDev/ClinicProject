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
            <a href="{{ route('doctors.create') }}" class="btn btn-success">Create Doctor</a>
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
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <div class="card-body">
                    <table id="clinic" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Doctor's Name</th>
                                <th>Address</th>
                                <th>Phone No.</th>
                                <th>Department Id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($doctors as $doctor)
                            <tr>
                              <td>{{$doctor->id}}</td>
                              <td>{{$doctor->name}}</td>
                              <td>{{$doctor->address}}</td>
                              <td>{{$doctor->phone_no}}</td>
                              <td>{{$doctor->department_id}}</td>
                              <td>
                                <a href="{{route('doctors.edit', $doctor->id)}}" class="btn btn-warning">Edit</a>
                                <form action="{{route('doctors.destroy', $doctor->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" onclick="return confirm('Are you sure you want to delete this names?');" class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
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

@endsection