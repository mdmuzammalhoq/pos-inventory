@extends('layouts.admin.menubar')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Unit </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Unit </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Unit  <a href="{{ route('units.view')}}" class="btn btn-success btn-sm pull-right">Unit List</a>
</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="{{ route('units.update', $edit->id)}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="name">Unit Name <span style="color: red;">*</span></label>
                    <input type="text" class="form-control" value="{{ $edit->unit_name }}" name="unit_name">
                    <span style="color: red;">{{($errors->has('unit_name'))?($errors->first('unit_name')):''}}</span>
                  </div>
                </div>
               
                <div class="card-body col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mt-4">Update</button>
                </div>
              </div>
              </form>
            </div>
            <!-- /.card -->
</div>

          </div>
       
    </section>




@endsection