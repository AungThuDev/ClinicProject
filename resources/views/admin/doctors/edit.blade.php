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
                    <h3 class="card-title">Please Fill the Doctors Description detail</h3>
                </div>
                <div class="card-body">
                  @if($errors->any())
                  <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach
                  </div>
                  @endif
                    <form action="{{ route('doctors.update',$doctor->id) }}" method="post">
                        @CSRF
                        @method('PUT')
                        <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" class="form-control" value="{{$doctor->name}}" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                          <label for="">Address</label>
                          <input type="text" class="form-control" value="{{$doctor->address}}" name="address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                          <label for="">Phone No</label>
                          <input type="text" class="form-control" value="{{$doctor->phone_no}}" name="phone_no" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="department">Department</label>
                            <select name="department" id="department" class="form-control">
                                <option value="">Select Category</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{$department->id == $doctor->department_id ? 'selected' : ''}}>{{$department->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-success">Submit</button>
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