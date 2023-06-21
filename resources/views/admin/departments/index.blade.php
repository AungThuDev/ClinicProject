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
            <a href="{{ route('departments.create') }}" class="btn btn-success">Create Department</a>
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
                    <h3 class="card-title">DataTable with Departments' Description</h3>
                </div>
                <div class="card-body">
                    @if(session('info'))
                    <div class="alert alert-success">
                      {{session('info')}}
                    </div>
                    @endif
                    <table id="clinic" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($deparments as $dep)
                            <tr>
                              <td>{{$dep->id}}</td>
                              <td>{{$dep->name}}</td>
                              <td>
                              <div class="row">
                                <a href="{{ route('departments.edit', $dep->id) }}" style="margin-right:10px ;" class="btn btn-warning">Edit</a>
                                <form action="{{route('departments.destroy', $dep->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" onclick="return confirm('Are you sure you want to delete this names?');" class="btn btn-danger">Delete</button>
                                </form>
                              </div>  
                              
                              
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