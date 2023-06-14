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
            <a href="/" class="btn btn-success">Back</a>
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
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('departments.update',$department->id) }}" method="post">
                        @CSRF
                        @method('PUT')
                        <div class="form-group">
                          <label for="">Department Name</label>
                          <input type="text" class="form-control" name="name" value="{{$department->name}}" placeholder="Enter Department Name">
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

@endsection